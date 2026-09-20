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

/**
 * Mime type icon provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Provider
 */
trait MimeTypeIconProviderTrait {

    /**
     * Mime type icon provider.
     *
     * @var MimeTypeIconProvider|null
     */
    private $mimeTypeIconProvider;

    /**
     * Get the mime type icon provider.
     *
     * @return MimeTypeIconProvider|null Returns the mime type icon provider.
     */
    public function getMimeTypeIconProvider(): ?MimeTypeIconProvider {
        return $this->mimeTypeIconProvider;
    }

    /**
     * Set the mime type icon provider.
     *
     * @param MimeTypeIconProvider|null $mimeTypeIconProvider The mime type icon provider.
     * @return self Returns this instance.
     */
    public function setMimeTypeIconProvider(?MimeTypeIconProvider $mimeTypeIconProvider): self {
        $this->mimeTypeIconProvider = $mimeTypeIconProvider;
        return $this;
    }
}
