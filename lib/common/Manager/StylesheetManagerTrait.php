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

namespace WBW\Bundle\CommonBundle\Manager;

/**
 * Stylesheet manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
trait StylesheetManagerTrait {

    /**
     * Stylesheet manager.
     *
     * @var StylesheetManagerInterface|null
     */
    private $stylesheetManager;

    /**
     * Get the stylesheet manager.
     *
     * @return StylesheetManagerInterface|null Returns the stylesheet manager.
     */
    public function getStylesheetManager(): ?StylesheetManagerInterface {
        return $this->stylesheetManager;
    }

    /**
     * Set the stylesheet manager.
     *
     * @param StylesheetManagerInterface|null $stylesheetManager The stylesheet manager.
     * @return self Returns this instance.
     */
    protected function setStylesheetManager(?StylesheetManagerInterface $stylesheetManager): self {
        $this->stylesheetManager = $stylesheetManager;
        return $this;
    }
}
