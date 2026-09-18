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
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Exception;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Throwable;
use WBW\Bundle\DocumentBundle\Serializer\JsonSerializer;
use WBW\Library\Common\Sorter\AlphabeticalNodeInterface;
use WBW\Library\Common\Traits\DateTimes\DateTimeCreatedAtTrait;
use WBW\Library\Common\Traits\DateTimes\DateTimeUpdatedAtTrait;
use WBW\Library\Common\Traits\Integers\IntegerIdTrait;
use WBW\Library\Common\Traits\Integers\IntegerSizeTrait;
use WBW\Library\Common\Traits\Integers\IntegerTypeTrait;
use WBW\Library\Common\Traits\Strings\StringExtensionTrait;
use WBW\Library\Common\Traits\Strings\StringHashMd5Trait;
use WBW\Library\Common\Traits\Strings\StringHashSha1Trait;
use WBW\Library\Common\Traits\Strings\StringHashSha256Trait;
use WBW\Library\Common\Traits\Strings\StringMimeTypeTrait;
use WBW\Library\Common\Traits\Strings\StringNameTrait;
use WBW\Library\Common\Traits\Strings\StringUidTrait;

/**
 * Abstract document.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Model
 * @abstract
 */
abstract class AbstractDocument implements DocumentInterface {

    use DateTimeCreatedAtTrait;
    use DateTimeUpdatedAtTrait;
    use IntegerSizeTrait;
    use IntegerIdTrait;
    use IntegerTypeTrait;
    use StringExtensionTrait;
    use StringHashMd5Trait;
    use StringHashSha1Trait;
    use StringHashSha256Trait;
    use StringMimeTypeTrait;
    use StringNameTrait;
    use StringUidTrait;

    /**
     * Children.
     *
     * @var Collection<int,DocumentInterface>
     */
    protected $children;

    /**
     * Number of downloads.
     *
     * @var int|null
     */
    protected $numberDownloads;

    /**
     * Parent.
     *
     * @var DocumentInterface|null
     */
    protected $parent;

    /**
     * Saved parent.
     *
     * @var DocumentInterface|null
     */
    protected $savedParent;

    /**
     * Upload.
     *
     * @var UploadedFile|null
     */
    protected $uploadedFile;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setCreatedAt(new DateTime());
        $this->setChildren(new ArrayCollection());
        $this->setNumberDownloads(0);
        $this->setSize(0);
        $this->setType(self::TYPE_DOCUMENT);
    }

    /**
     * {@inheritDoc}
     */
    public function addChild(DocumentInterface $child): DocumentInterface {
        $this->children[] = $child;
        $child->setParent($this);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function decreaseSize(?int $size): DocumentInterface {
        $this->size -= $size;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAlphabeticalNodeLabel(): ?string {
        return $this->getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getAlphabeticalNodeParent(): ?AlphabeticalNodeInterface {
        return $this->parent;
    }

    /**
     * {@inheritDoc}
     */
    public function getChildren(): Collection {
        return $this->children;
    }

    /**
     * {@inheritDoc}
     */
    public function getNumberDownloads(): ?int {
        return $this->numberDownloads;
    }

    /**
     * {@inheritDoc}
     */
    public function getParent(): ?DocumentInterface {
        return $this->parent;
    }

    /**
     * {@inheritDoc}
     */
    public function getSavedParent(): ?DocumentInterface {
        return $this->savedParent;
    }

    /**
     * {@inheritDoc}
     */
    public function getUploadedFile(): ?UploadedFile {
        return $this->uploadedFile;
    }

    /**
     * {@inheritDoc}
     */
    public function hasChildren(): bool {
        return 0 < count($this->children);
    }

    /**
     * {@inheritDoc}
     */
    public function increaseSize(?int $size): DocumentInterface {
        $this->size += $size;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function incrementNumberDownloads(): DocumentInterface {
        ++$this->numberDownloads;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isDirectory(): bool {
        return self::TYPE_DIRECTORY === $this->getType();
    }

    /**
     * {@inheritDoc}
     */
    public function isDocument(): bool {
        return self::TYPE_DOCUMENT === $this->getType();
    }

    /**
     * {@inheritDoc}
     * @return array<string,mixed> Returns this serialized instance.
     */
    public function jsonSerialize(): array {
        return JsonSerializer::serializeDocument($this);
    }

    /**
     * Pre remove
     *
     * @return void
     * @throws Throwable Throws an exception if the directory is not empty.
     */
    public function preRemove(): void {

        if (true === $this->hasChildren()) {
            throw new Exception("This directory is not empty");
        }
    }

    /**
     * {@inheritDoc}
     */
    public function removeChild(DocumentInterface $child): DocumentInterface {
        $this->children->removeElement($child);
        $child->setParent($this);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function saveParent(): DocumentInterface {
        $this->savedParent = $this->parent;
        return $this;
    }

    /**
     * Set the children.
     *
     * @param Collection<int,DocumentInterface> $children The children.
     * @return DocumentInterface Returns this document.
     */
    protected function setChildren(Collection $children): DocumentInterface {
        $this->children = $children;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setNumberDownloads(?int $numberDownloads): DocumentInterface {
        $this->numberDownloads = $numberDownloads;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setParent(?DocumentInterface $parent): DocumentInterface {
        $this->parent = $parent;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setType(?int $type): DocumentInterface {
        if (false === in_array($type, [self::TYPE_DIRECTORY, self::TYPE_DOCUMENT])) {
            throw new InvalidArgumentException(sprintf('The type "%s" is invalid', $type));
        }
        $this->type = $type;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setUploadedFile(?UploadedFile $uploadedFile): DocumentInterface {
        $this->uploadedFile = $uploadedFile;
        return $this;
    }
}
