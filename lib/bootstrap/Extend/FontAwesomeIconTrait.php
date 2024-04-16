<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Extend;

/**
 * Font Awesome icon trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Extend
 */
trait FontAwesomeIconTrait {

    /**
     * Font Awesome icon.
     *
     * @var FontAwesomeIconInterface|null
     */
    protected $fontAwesomeIcon;

    /**
     * Get the Font Awesome icon.
     *
     * @return FontAwesomeIconInterface|null Returns the Font Awesome icon.
     */
    public function getFontAwesomeIcon(): ?FontAwesomeIconInterface {
        return $this->fontAwesomeIcon;
    }

    /**
     * Set the Font Awesome icon.
     *
     * @param FontAwesomeIconInterface|null $fontAwesomeIcon The Font Awesome icon.
     * @return self Returns this instance.
     */
    public function setFontAwesomeIcon(?FontAwesomeIconInterface $fontAwesomeIcon): self {
        $this->fontAwesomeIcon = $fontAwesomeIcon;
        return $this;
    }
}
