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

namespace WBW\Bundle\DocumentBundle\Provider\Storage;

use DateTime;
use Psr\Log\LoggerInterface;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Helper\DocumentHelper;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;
use WBW\Bundle\DocumentBundle\Provider\StorageProviderInterface;
use WBW\Library\Common\Logger\LoggerTrait;
use WBW\Library\Common\Traits\Strings\StringDirectoryTrait;
use ZipArchive;

/**
 * Filesystem storage provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Provider\Storage
 */
class FilesystemStorageProvider implements StorageProviderInterface {

    use LoggerTrait;
    use StringDirectoryTrait {
        setDirectory as protected;
    }

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.edm.provider.storage.filesystem";

    /**
     * Constructor.
     *
     * @param LoggerInterface $logger The logger.
     * @param string $directory The directory.
     */
    public function __construct(LoggerInterface $logger, string $directory) {
        $logger->debug(sprintf('Filesystem storage provider use this directory "%s"', $directory));
        $this->setDirectory($directory);
        $this->setLogger($logger);
    }

    /**
     * {@inheritDoc}
     */
    public function deleteDirectory(DocumentInterface $directory): void {

        DocumentHelper::isDirectory($directory);

        $pathname = $this->getAbsolutePath($directory);
        $context  = [
            "_provider" => get_class($this),
        ];

        $this->logInfo(sprintf('Filesystem storage provider tries to delete the directory "%s"', $pathname), $context);

        $filesystem = new Filesystem();
        $filesystem->remove($pathname);
    }

    /**
     * {@inheritDoc}
     */
    public function deleteDocument(DocumentInterface $document): void {

        DocumentHelper::isDocument($document);

        $pathname = $this->getAbsolutePath($document);
        $context  = [
            "_provider" => get_class($this),
        ];

        $this->logInfo(sprintf('Filesystem storage provider tries to delete the document "%s"', $pathname), $context);

        $filesystem = new Filesystem();
        $filesystem->remove($pathname);
    }

    /**
     * {@inheritDoc}
     */
    public function downloadDirectory(DocumentInterface $directory): Response {
        return $this->newStreamedResponse($directory);
    }

    /**
     * {@inheritDoc}
     */
    public function downloadDocument(DocumentInterface $document): Response {
        return $this->newStreamedResponse($document);
    }

    /**
     * Get an absolute path.
     *
     * @param DocumentInterface $document The document.
     * @param bool $rename Rename ?
     * @return string Returns the absolute path.
     */
    protected function getAbsolutePath(DocumentInterface $document, bool $rename = false): string {

        $path = [
            $this->getDirectory(),
        ];

        foreach (DocumentHelper::getPaths($document, $rename) as $current) {
            $path[] = $current->getId();
        }

        return implode(DIRECTORY_SEPARATOR, $path);
    }

    /**
     * Log an info.
     *
     * @param string $message The message.
     * @param mixed[] $context The context.
     * @return StorageProviderInterface Returns this filesystem storage provider.
     */
    protected function logInfo(string $message, array $context = []): StorageProviderInterface {
        $this->getLogger()->info($message, $context);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function moveDocument(DocumentInterface $document): void {

        $src = $this->getAbsolutePath($document, true);
        $dst = $this->getAbsolutePath($document);

        $context = [
            "_provider" => get_class($this),
        ];

        $this->logInfo(sprintf('Filesystem storage provider tries to move "%s" into "%s"', $src, $dst), $context);

        $filesystem = new Filesystem();
        $filesystem->rename($src, $dst);
    }

    /**
     * {@inheritDoc}
     */
    public function newDirectory(DocumentInterface $directory): void {

        DocumentHelper::isDirectory($directory);

        $pathname = $this->getAbsolutePath($directory);
        $context  = [
            "_provider" => get_class($this),
        ];

        $this->logInfo(sprintf('Filesystem storage provider tries to create the directory "%s"', $pathname), $context);

        $filesystem = new Filesystem();
        $filesystem->mkdir($pathname);
    }

    /**
     * Create a new streamed response.
     *
     * @param DocumentInterface $document The document.
     * @return StreamedResponse Returns the streamed response.
     * @throws Throwable Throws an exception if an error occurs.
     */
    protected function newStreamedResponse(DocumentInterface $document): Response {

        $myself = $this;

        /** @var callable $callback */
        $callback = function() use ($document, $myself) {

            if (true === $document->isDocument()) {
                $myself->streamDocument($document);
                return;
            }

            $archive = $myself->zipDirectory($document);
            $myself->streamDocument($archive);
        };

        $timestamp = (new DateTime())->format("Y.m.d-H.i");
        $filename  = str_replace(" ", "_", DocumentHelper::getFilename($document));
        $extension = true === $document->isDirectory() ? ".zip" : "";
        $mimeType  = true === $document->isDirectory() ? "application/zip" : $document->getMimeType();

        $response = new StreamedResponse();
        $response->headers->set("Content-Disposition", "attachement; filename=\"{$timestamp}_$filename$extension\"");
        $response->headers->set("Content-Type", $mimeType);
        $response->setCallback($callback);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * Create a ZIP document.
     *
     * @param DocumentInterface $document The document.
     * @return DocumentInterface Returns the ZIP document.
     * @throws ReflectionException Throws a Reflection exception if an error occurs.
     */
    protected function newZipDocument(DocumentInterface $document): DocumentInterface {

        $id = (new DateTime())->format("YmdHisu");

        $model = new Document();
        $model->setExtension("zip");
        $model->setMimeType("application/zip");
        $model->setName($document->getName() . "-" . $id);
        $model->setType(DocumentInterface::TYPE_DOCUMENT);

        // Use reflection to set the private id attribute.
        $idProperty = (new ReflectionClass($model))->getProperty("id");
        $idProperty->setAccessible(true);
        $idProperty->setValue($model, intval($id));

        return $model;
    }

    /**
     * Stream a document.
     *
     * @param DocumentInterface $document The document.
     * @return void
     */
    protected function streamDocument(DocumentInterface $document): void {

        $filename = $this->getAbsolutePath($document);

        $input  = fopen($filename, "r");
        $output = fopen("php://output", "w+");

        while (false === feof($input)) {
            stream_copy_to_stream($input, $output, 4096);
        }

        fclose($input);
        fclose($output);

        if (1 === preg_match("/\.download$/", $filename)) {
            unlink($filename);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function uploadDocument(DocumentInterface $document): void {

        DocumentHelper::isDocument($document);

        $src = $document->getUploadedFile()->getRealPath();
        $dst = $this->getAbsolutePath($document);

        $context = [
            "_provider" => get_class($this),
        ];

        $this->logInfo(sprintf('Filesystem storage provider tries to copy the uploaded document "%s" into "%s"', $src, $dst), $context);

        $filesystem = new Filesystem();
        $filesystem->copy($src, $dst);
    }

    /**
     * Zip a directory.
     *
     * @param DocumentInterface $directory The directory.
     * @return DocumentInterface Returns the zipped directory in case success.
     * @throws ReflectionException Throws a Reflection exception if an error occurs.
     */
    protected function zipDirectory(DocumentInterface $directory): DocumentInterface {

        $archive = $this->newZipDocument($directory);

        $src = $this->getAbsolutePath($directory);
        $dst = $this->getAbsolutePath($archive);

        $zip = new ZipArchive();
        $zip->open($dst, ZipArchive::CREATE);

        foreach ($directory->getChildren() as $current) {

            $pattern = implode("", ["/^", preg_quote("$src/", "/"), "/"]);
            $zipPath = preg_replace($pattern, "", DocumentHelper::getPathname($current));

            if (true === $current->isDirectory()) {
                $zip->addEmptyDir($zipPath);
            }
            if (true === $current->isDocument()) {
                $zip->addFromString($zipPath, file_get_contents($this->getAbsolutePath($current)));
            }
        }

        $zip->close();

        return $archive;
    }
}
