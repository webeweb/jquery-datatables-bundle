<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Model;

/**
 * Document trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Model
 */
trait DocumentTrait {

    /**
     * Document.
     *
     * @var DocumentInterface|null
     */
    protected $document;

    /**
     * Get the document.
     *
     * @return DocumentInterface|null Returns the document.
     */
    public function getDocument(): ?DocumentInterface {
        return $this->document;
    }

    /**
     * Set the document.
     *
     * @param DocumentInterface|null $document The document.
     * @return self Returns this instance.
     */
    public function setDocument(?DocumentInterface $document): self {
        $this->document = $document;
        return $this;
    }
}
