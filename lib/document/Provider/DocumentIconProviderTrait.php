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
 * Document icon provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Provider
 */
trait DocumentIconProviderTrait {

    /**
     * Document icon provider.
     *
     * @var DocumentIconProvider|null
     */
    private $documentIconProvider;

    /**
     * Get the document icon provider.
     *
     * @return DocumentIconProvider|null Returns the document icon provider.
     */
    public function getDocumentIconProvider(): ?DocumentIconProvider {
        return $this->documentIconProvider;
    }

    /**
     * Set the document icon provider.
     *
     * @param DocumentIconProvider|null $documentIconProvider The document icon provider.
     * @return self Returns this instance.
     */
    public function setDocumentIconProvider(?DocumentIconProvider $documentIconProvider): self {
        $this->documentIconProvider = $documentIconProvider;
        return $this;
    }
}
