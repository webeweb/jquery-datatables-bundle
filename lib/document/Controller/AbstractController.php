<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use WBW\Bundle\BootstrapBundle\Controller\AbstractController as BaseController;
use WBW\Bundle\DocumentBundle\DependencyInjection\WBWDocumentExtension;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Event\DocumentEvent;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Repository\DocumentRepository;
use WBW\Bundle\DocumentBundle\WBWDocumentBundle;
use WBW\Library\Common\Model\Response\SimpleJsonResponseData;
use WBW\Library\Common\Model\Response\SimpleJsonResponseDataInterface;

/**
 * Abstract controller.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Controller
 * @abstract
 */
abstract class AbstractController extends BaseController {

    /**
     * Build a redirect route.
     *
     * @param DocumentInterface $document The document.
     * @return mixed[] Returns the redirect route.
     */
    protected function buildRedirectRoute(DocumentInterface $document): array {

        return [
            WBWDocumentExtension::EXTENSION_ALIAS . "_document_index",
            [
                "id" => null === $document->getParent() ? null : $document->getParent()->getId(),
            ],
        ];
    }

    /**
     * Dispatch an event.
     *
     * @param string $eventName The event name.
     * @param DocumentInterface $document The document.
     * @return DocumentEvent|null Returns the document event.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function dispatchDocumentEvent(string $eventName, DocumentInterface $document): ?DocumentEvent {

        $event = new DocumentEvent($eventName, $document);
        $this->dispatchEvent($event, $eventName);

        return $event;
    }

    /**
     * Find a document.
     *
     * @param int|null $id The document.
     * @param bool $ex Throws exception ?
     * @return DocumentInterface|null Returns the document.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function findDocument(?int $id, bool $ex): ?DocumentInterface {

        /** @var DocumentRepository $repository */
        $repository = $this->getEntityManager()->getRepository(Document::class);

        $document = $repository->findOneById($id);
        if (null === $document && true === $ex) {
            throw new NotFoundHttpException();
        }

        return $document;
    }

    /**
     * Prepare an action response.
     *
     * @param int $status The status.
     * @param string $notify The notify.
     * @return SimpleJsonResponseDataInterface Returns the action response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function prepareActionResponse(int $status, string $notify): SimpleJsonResponseDataInterface {

        $response = new SimpleJsonResponseData();
        $response->setStatus($status);
        $response->setNotify($this->translate($notify));

        return $response;
    }

    /**
     * {@inheritDoc}
     */
    protected function translate(string $id, array $parameters = [], string $domain = null, string $locale = null): string {

        if (null === $domain) {
            $domain = WBWDocumentBundle::getTranslationDomain();
        }

        return parent::translate($id, $parameters, $domain, $locale);
    }
}
