<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\EventListener;

use Doctrine\ORM\EntityManagerInterface;
use Throwable;
use WBW\Bundle\CommonBundle\Doctrine\ORM\EntityManagerTrait;
use WBW\Bundle\DocumentBundle\Event\DocumentEvent;
use WBW\Bundle\DocumentBundle\Helper\DocumentHelper;
use WBW\Bundle\DocumentBundle\Manager\StorageManagerInterface;
use WBW\Bundle\DocumentBundle\Manager\StorageManagerTrait;

/**
 * Document event listener.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\EventListener
 */
class DocumentEventListener {

    use EntityManagerTrait;
    use StorageManagerTrait;

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.document.event_listener.document";

    /**
     * Constructor.
     *
     * @param EntityManagerInterface $entityManager The entity manager.
     * @param StorageManagerInterface $storageManager The storage manager.
     */
    public function __construct(EntityManagerInterface $entityManager, StorageManagerInterface $storageManager) {
        $this->setEntityManager($entityManager);
        $this->setStorageManager($storageManager);
    }

    /**
     * On delete document.
     *
     * @param DocumentEvent $event The event.
     * @return DocumentEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function onDeleteDocument(DocumentEvent $event): DocumentEvent {

        if (true === $event->getDocument()->isDirectory()) {
            $this->getStorageManager()->deleteDirectory($event->getDocument());
        } else {
            $this->getStorageManager()->deleteDocument($event->getDocument());
        }

        DocumentHelper::decreaseSize($event->getDocument()->getSize(), $event->getDocument()->getParent());
        $this->getEntityManager()->flush();

        return $event;
    }

    /**
     * On download document.
     *
     * @param DocumentEvent $event The event.
     * @return DocumentEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function onDownloadDocument(DocumentEvent $event): DocumentEvent {

        if (true === $event->getDocument()->isDirectory()) {
            $response = $this->getStorageManager()->downloadDirectory($event->getDocument());
        } else {
            $response = $this->getStorageManager()->downloadDocument($event->getDocument());
        }

        if (null !== $response) {
            $event->getDocument()->incrementNumberDownloads();
        }

        $this->getEntityManager()->flush();

        return $event->setResponse($response);
    }

    /**
     * On move document.
     *
     * @param DocumentEvent $event The event.
     * @return DocumentEvent Returns the event.
     */
    public function onMoveDocument(DocumentEvent $event): DocumentEvent {

        $this->getStorageManager()->moveDocument($event->getDocument());

        DocumentHelper::decreaseSize($event->getDocument()->getSize(), $event->getDocument()->getSavedParent());
        DocumentHelper::increaseSize($event->getDocument()->getSize(), $event->getDocument()->getParent());
        $this->getEntityManager()->flush();

        return $event;
    }

    /**
     * On new document.
     *
     * @param DocumentEvent $event The event.
     * @return DocumentEvent Returns the event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function onNewDocument(DocumentEvent $event): DocumentEvent {

        if (true === $event->getDocument()->isDocument()) {
            $this->getStorageManager()->uploadDocument($event->getDocument());
        } else {
            $this->getStorageManager()->newDirectory($event->getDocument());
        }

        DocumentHelper::increaseSize($event->getDocument()->getSize(), $event->getDocument()->getParent());
        $this->getEntityManager()->flush();

        return $event;
    }
}
