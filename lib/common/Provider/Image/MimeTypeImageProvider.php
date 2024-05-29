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

namespace WBW\Bundle\CommonBundle\Provider\Image;

use DirectoryIterator;
use WBW\Library\Common\Traits\Strings\StringDirectoryTrait;

/**
 * Mime type image provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Image
 */
class MimeTypeImageProvider implements MimeTypeImageProviderInterface {

    use StringDirectoryTrait {
        setDirectory as protected;
    }

    /**
     * Default image.
     *
     * @var string
     */
    public const DEFAULT_IMAGE = "unknown.svg";

    /**
     * Images folder.
     *
     * @var string
     */
    public const IMAGES_FOLDER = "img/mimetype/default";

    /**
     * Service name.
     *
     * @var string
     */
    public const SERVICE_NAME = "wbw.common.provider.image.mime_type";

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setDirectory(realpath(__DIR__ . "/../../Resources/public/" . self::IMAGES_FOLDER));
    }

    /**
     * {@inheritDoc}
     */
    public function getImage(?string $name): string {

        $mimeType = str_replace("/", "-", $name);
        $filename = "$mimeType.svg";

        if (true === in_array($filename, $this->getImages())) {
            return $filename;
        }

        return self::DEFAULT_IMAGE;
    }

    /**
     * {@inheritDoc}
     */
    public function getImageUri(?string $name): string {

        return implode(DIRECTORY_SEPARATOR, [
            $this->getDirectory(),
            $this->getImage($name),
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageUrl(?string $name): string {
        return "/bundles/wbwcommon/" . self::IMAGES_FOLDER . "/{$this->getImage($name)}";
    }

    /**
     * {@inheritDoc}
     */
    public function getImages(): array {

        static $images;

        if (null !== $images) {
            return $images;
        }

        $images = [];

        /** @var DirectoryIterator $current */
        foreach (new DirectoryIterator($this->getDirectory()) as $current) {

            if (true === $current->isFile()) {
                $images[] = $current->getFilename();
            }
        }

        sort($images, SORT_STRING);

        return $images;
    }
}
