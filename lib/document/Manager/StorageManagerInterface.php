<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Manager;

use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WBW\Bundle\CommonBundle\Manager\ManagerInterface;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;

/**
 * Storage manager interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Manager
 */
interface StorageManagerInterface extends ManagerInterface {

    /**
     * Delete a directory.
     *
     * @param DocumentInterface $directory The directory.
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function deleteDirectory(DocumentInterface $directory): void;

    /**
     * Delete a document.
     *
     * @param DocumentInterface $document The document.
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function deleteDocument(DocumentInterface $document): void;

    /**
     * Download a directory.
     *
     * @param DocumentInterface $directory The directory.
     * @return Response|null Returns the response in case of success, null otherwise.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function downloadDirectory(DocumentInterface $directory): ?Response;

    /**
     * Download a document.
     *
     * @param DocumentInterface $document The document.
     * @return Response|null Returns the response in case of success, null otherwise.
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function downloadDocument(DocumentInterface $document): ?Response;

    /**
     * Move a document.
     *
     * @param DocumentInterface $document The document.
     * @return void
     */
    public function moveDocument(DocumentInterface $document): void;

    /**
     * Create a directory.
     *
     * @param DocumentInterface $directory The directory.
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function newDirectory(DocumentInterface $directory): void;

    /**
     * Upload a document.
     *
     * @param DocumentInterface $document The document.
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function uploadDocument(DocumentInterface $document): void;
}
