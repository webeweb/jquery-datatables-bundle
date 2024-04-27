<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Manager;

/**
 * Layout manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
trait LayoutManagerTrait {

    /**
     * Layout manager.
     *
     * @var LayoutManagerInterface|null
     */
    private $layoutManager;

    /**
     * Get the layout manager.
     *
     * @return LayoutManagerInterface|null Returns the layout manager.
     */
    public function getLayoutManager(): ?LayoutManagerInterface {
        return $this->layoutManager;
    }

    /**
     * Set the layout manager.
     *
     * @param LayoutManagerInterface|null $layoutManager The layout manager.
     * @return self Returns this instance.
     */
    protected function setLayoutManager(?LayoutManagerInterface $layoutManager): self {
        $this->layoutManager = $layoutManager;
        return $this;
    }
}
