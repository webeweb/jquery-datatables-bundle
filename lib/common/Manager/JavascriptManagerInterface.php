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
 * Javascript manager interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
interface JavascriptManagerInterface extends ManagerInterface {

    /**
     * Get the javascripts.
     *
     * @return mixed[] Returns the javascripts.
     */
    public function getJavascripts(): array;
}
