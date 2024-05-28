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

namespace WBW\Bundle\CommonBundle\Manager;

/**
 * Javascript manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
trait JavascriptManagerTrait {

    /**
     * Javascript manager.
     *
     * @var JavascriptManagerInterface|null
     */
    private $javascriptManager;

    /**
     * Get the javascript manager.
     *
     * @return JavascriptManagerInterface|null Returns the javascript manager.
     */
    public function getJavascriptManager(): ?JavascriptManagerInterface {
        return $this->javascriptManager;
    }

    /**
     * Set the javascript manager.
     *
     * @param JavascriptManagerInterface|null $javascriptManager The javascript manager.
     * @return self Returns this instance.
     */
    protected function setJavascriptManager(?JavascriptManagerInterface $javascriptManager): self {
        $this->javascriptManager = $javascriptManager;
        return $this;
    }
}
