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

namespace WBW\Bundle\DocumentBundle\Model;

use DateTime;
use Doctrine\Common\Collections\Collection;
use InvalidArgumentException;
use JsonSerializable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use WBW\Library\Common\Sorter\AlphabeticalNodeInterface;

/**
 * Document interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Model
 */
interface DocumentInterface extends JsonSerializable, AlphabeticalNodeInterface {

    /**
     * Type "directory".
     *
     * @var int
     */
    public const TYPE_DIRECTORY = 705;

    /**
     * Type "document".
     *
     * @var int
     */
    public const TYPE_DOCUMENT = 485;

    /**
     * Add a child.
     *
     * @param DocumentInterface $child The child.
     * @return DocumentInterface Returns this document.
     */
    public function addChild(DocumentInterface $child): DocumentInterface;

    /**
     * Decrease the size.
     *
     * @param int|null $size The size.
     * @return DocumentInterface Returns this document.
     */
    public function decreaseSize(?int $size): DocumentInterface;

    /**
     * Get the children.
     *
     * @return Collection<int,DocumentInterface> Returns the children.
     */
    public function getChildren(): Collection;

    /**
     * Get the created at.
     *
     * @return DateTime|null Returns the created at.
     */
    public function getCreatedAt(): ?DateTime;

    /**
     * Get the extension.
     *
     * @return string|null Returns the extension.
     */
    public function getExtension(): ?string;

    /**
     * Get the hash "MD5".
     *
     * @return string|null Returns the hash "MD5".
     */
    public function getHashMd5(): ?string;

    /**
     * Get the hash "SHA1".
     *
     * @return string|null Returns the hash "SHA1".
     */
    public function getHashSha1(): ?string;

    /**
     * Get the hash "SHA256".
     *
     * @return string|null Returns the hash "SHA256".
     */
    public function getHashSha256(): ?string;

    /**
     * Get the id.
     *
     * @return int|null Returns the id.
     */
    public function getId(): ?int;

    /**
     * Get the mime type.
     *
     * @return string|null Returns the mime type.
     */
    public function getMimeType(): ?string;

    /**
     * Get the name.
     *
     * @return string|null Returns the name.
     */
    public function getName(): ?string;

    /**
     * Get the number of downloads.
     *
     * @return int|null Returns the number of downloads.
     */
    public function getNumberDownloads(): ?int;

    /**
     * Get the parent.
     *
     * @return DocumentInterface|null Returns the parent.
     */
    public function getParent(): ?DocumentInterface;

    /**
     * Get the saved parent.
     *
     * @return DocumentInterface|null Returns the saved parent.
     */
    public function getSavedParent(): ?DocumentInterface;

    /**
     * Get the size.
     *
     * @return int|null Returns the size.
     */
    public function getSize(): ?int;

    /**
     * Get the type.
     *
     * @return int|null Returns the type.
     */
    public function getType(): ?int;

    /**
     * Get the UID.
     *
     * @return string|null Returns the UID.
     */
    public function getUid(): ?string;

    /**
     * Get the updated at.
     *
     * @return DateTime|null Returns the updated at.
     */
    public function getUpdatedAt(): ?DateTime;

    /**
     * Get the uploaded file.
     *
     * @return UploadedFile|null Returns the uploaded file.
     */
    public function getUploadedFile(): ?UploadedFile;

    /**
     * Determine if this document has children.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function hasChildren(): bool;

    /**
     * Increase the size.
     *
     * @param int|null $size The size.
     * @return DocumentInterface Returns this document.
     */
    public function increaseSize(?int $size): DocumentInterface;

    /**
     * Increment the number of downloads.
     *
     * @return DocumentInterface Returns this document interface
     */
    public function incrementNumberDownloads(): DocumentInterface;

    /**
     * Determine if this document is a directory.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function isDirectory(): bool;

    /**
     * Determine if this document is a document.
     *
     * @return bool Returns true in case of success, false otherwise.
     */
    public function isDocument(): bool;

    /**
     * Remove a child.
     *
     * @param DocumentInterface $child The child.
     * @return DocumentInterface Returns this document.
     */
    public function removeChild(DocumentInterface $child): DocumentInterface;

    /**
     * Save the parent.
     *
     * @return DocumentInterface Returns this document.
     */
    public function saveParent(): DocumentInterface;

    /**
     * Set the created at.
     *
     * @param DateTime|null $createdAt The created at.
     * @return DocumentInterface Returns this document.
     */
    public function setCreatedAt(?DateTime $createdAt);

    /**
     * Set the extension.
     *
     * @param string|null $extension The extension.
     * @return DocumentInterface Returns this document.
     */
    public function setExtension(?string $extension);

    /**
     * Set the hash "MD5".
     *
     * @param string|null $hashMd5 The hash "MD5".
     * @return DocumentInterface Returns this document.
     */
    public function setHashMd5(?string $hashMd5);

    /**
     * Set the hash "SHA1".
     *
     * @param string|null $hashSha1 The hash "SHA1".
     * @return DocumentInterface Returns this document.
     */
    public function setHashSha1(?string $hashSha1);

    /**
     * Set the hash "SHA256".
     *
     * @param string|null $hashSha256 The hash "SHA256".
     * @return DocumentInterface Returns this document.
     */
    public function setHashSha256(?string $hashSha256);

    /**
     * Set the mime type.
     *
     * @param string|null $mimeType The mime type.
     * @return DocumentInterface Returns this document.
     */
    public function setMimeType(?string $mimeType);

    /**
     * Set the name.
     *
     * @param string|null $name The name.
     * @return DocumentInterface Returns this document.
     */
    public function setName(?string $name);

    /**
     * Set the number of downloads.
     *
     * @param int|null $numberDownloads The number of downloads.
     * @return DocumentInterface Returns this document.
     */
    public function setNumberDownloads(?int $numberDownloads): DocumentInterface;

    /**
     * Set the parent.
     *
     * @param DocumentInterface|null $parent The parent.
     * @return DocumentInterface Returns this document.
     */
    public function setParent(?DocumentInterface $parent): DocumentInterface;

    /**
     * Set the size.
     *
     * @param int|null $size The size.
     * @return DocumentInterface Returns this document.
     */
    public function setSize(?int $size);

    /**
     * Set the type.
     *
     * @param int|null $type The type.
     * @return DocumentInterface Returns this document.
     * @throws InvalidArgumentException Throws an invalid argument exception if the type is invalid.
     */
    public function setType(?int $type): DocumentInterface;

    /**
     * Set the UID.
     *
     * @param string|null $uid The UID.
     * @return DocumentInterface Returns this document.
     */
    public function setUid(?string $uid);

    /**
     * Set the updated at.
     *
     * @param DateTime|null $updatedAt The updated at.
     * @return DocumentInterface Returns this document.
     */
    public function setUpdatedAt(?DateTime $updatedAt);

    /**
     * Set the uploaded file.
     *
     * @param UploadedFile|null $uploadedFile The uploaded file.
     * @return DocumentInterface Returns this document.
     */
    public function setUploadedFile(?UploadedFile $uploadedFile): DocumentInterface;
}
