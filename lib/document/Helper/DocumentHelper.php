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

namespace WBW\Bundle\DocumentBundle\Helper;

use InvalidArgumentException;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;

/**
 * Document helper.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Helper
 */
class DocumentHelper {

    /**
     * Decrease the size.
     *
     * @param int $size The size.
     * @param DocumentInterface|null $document The document.
     * @return void
     */
    public static function decreaseSize(int $size, ?DocumentInterface $document): void {

        if (null === $document) {
            return;
        }

        $document->decreaseSize($size);
        static::decreaseSize($size, $document->getParent());
    }

    /**
     * Flatten the children.
     *
     * @param DocumentInterface $document The document.
     * @return DocumentInterface[] Returns the flatten children.
     */
    public static function flattenChildren(DocumentInterface $document): array {

        $children = [];

        foreach ($document->getChildren() as $current) {
            $children = array_merge($children, [$current], static::flattenChildren($current));
        }

        return $children;
    }

    /**
     * Get a filename.
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the filename.
     */
    public static function getFilename(DocumentInterface $document): string {

        if ($document->isDirectory()) {
            return $document->getName();
        }

        $filename = implode(".", [
            $document->getName(), $document->getExtension(),
        ]);

        return "." !== $filename ? $filename : "";
    }

    /**
     * Get a pathname.
     *
     * @param DocumentInterface $document The document.
     * @return string Return the pathname.
     */
    public static function getPathname(DocumentInterface $document): string {

        $path = [];
        foreach (static::getPaths($document) as $current) {
            $path[] = static::getFilename($current);
        }

        return implode(DIRECTORY_SEPARATOR, $path);
    }

    /**
     * Get the paths.
     *
     * @param DocumentInterface $document The document.
     * @param bool $backedUp Backed up ?
     * @return DocumentInterface[] Returns the paths.
     */
    public static function getPaths(DocumentInterface $document, bool $backedUp = false): array {

        $path = [];

        $current = $document;
        while (null !== $current) {
            array_unshift($path, $current); // Insert parent path at start.
            $current = $current === $document && true === $backedUp ? $current->getSavedParent() : $current->getParent();
        }

        return $path;
    }

    /**
     * Increase a size.
     *
     * @param int $size The size.
     * @param DocumentInterface|null $document The document.
     * @return void
     */
    public static function increaseSize(int $size, ?DocumentInterface $document): void {

        if (null === $document) {
            return;
        }

        $document->increaseSize($size);
        static::increaseSize($size, $document->getParent());
    }

    /**
     * Determine if a document is a directory.
     *
     * @param DocumentInterface $document The document.
     * @return bool Returns true.
     * @throws InvalidArgumentException Throws an invalid argument exception if the document is of 'document' type.
     */
    public static function isDirectory(DocumentInterface $document): bool {
        if (false === $document->isDirectory()) {
            throw new InvalidArgumentException("The document must be of 'directory' type");
        }
        return true;
    }

    /**
     * Determine if a document is a document.
     *
     * @param DocumentInterface $document The document.
     * @return bool Returns true.
     * @throws InvalidArgumentException Throws an invalid argument exception if the document is of 'directory' type.
     */
    public static function isDocument(DocumentInterface $document): bool {
        if (false === $document->isDocument()) {
            throw new InvalidArgumentException("The document must be of 'document' type");
        }
        return true;
    }
}
