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

namespace WBW\Bundle\DocumentBundle\Provider;

use WBW\Bundle\CommonBundle\Provider\Image\MimeTypeImageProvider;
use WBW\Bundle\CommonBundle\Provider\Image\MimeTypeImageProviderTrait;
use WBW\Bundle\DocumentBundle\Model\DocumentInterface;

/**
 * Document icon provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Provider
 */
class DocumentIconProvider {

    use MimeTypeImageProviderTrait;

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.document.provider.document_icon";

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setMimeTypeImageProvider(new MimeTypeImageProvider());
    }

    /**
     * Get an icon.
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the icon.
     */
    public function getIcon(DocumentInterface $document): string {

        $name = $this->getMimeType($document);

        return $this->getMimeTypeImageProvider()->getImage($name);
    }

    /**
     * Get the icon asset.
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the icon asset.
     */
    public function getIconAsset(DocumentInterface $document): string {

        $name = $this->getMimeType($document);

        return $this->getMimeTypeImageProvider()->getImageUrl($name);
    }

    /**
     * Get the mime type.
     *
     * @param DocumentInterface $document The document.
     * @return string Returns the mime type.
     */
    protected function getMimeType(DocumentInterface $document): string {
        return true === $document->isDirectory() ? "folder" : $document->getMimeType();
    }
}
