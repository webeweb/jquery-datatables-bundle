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

/**
 * Mime type image provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Image
 */
trait MimeTypeImageProviderTrait {

    /**
     * Mime type image provider.
     *
     * @var MimeTypeImageProviderInterface|null
     */
    protected $mimeTypeImageProvider;

    /**
     * Get the mime type image provider.
     *
     * @return MimeTypeImageProviderInterface|null Returns the mime type image provider.
     */
    public function getMimeTypeImageProvider(): ?MimeTypeImageProviderInterface {
        return $this->mimeTypeImageProvider;
    }

    /**
     * Set the mime type image provider.
     *
     * @param MimeTypeImageProviderInterface|null $mimeTypeImageProvider The mime type image provider.
     * @return self Returns this instance.
     */
    protected function setMimeTypeImageProvider(?MimeTypeImageProviderInterface $mimeTypeImageProvider): self {
        $this->mimeTypeImageProvider = $mimeTypeImageProvider;
        return $this;
    }
}
