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

namespace WBW\Bundle\BootstrapBundle\Extend;

/**
 * Tabler icon trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Extend
 */
trait TablerIconTrait {

    /**
     * Tabler icon.
     *
     * @var TablerIconInterface|null
     */
    protected $tablerIcon;

    /**
     * Get the Tabler icon.
     *
     * @return TablerIconInterface|null Returns the Tabler icon.
     */
    public function getTablerIcon(): ?TablerIconInterface {
        return $this->tablerIcon;
    }

    /**
     * Set the Tabler icon.
     *
     * @param TablerIconInterface|null $tablerIcon The Tabler icon.
     * @return self Returns this instance.
     */
    public function setTablerIcon(?TablerIconInterface $tablerIcon): self {
        $this->tablerIcon = $tablerIcon;
        return $this;
    }
}
