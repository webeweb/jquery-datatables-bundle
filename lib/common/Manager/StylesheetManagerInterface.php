<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Manager;

/**
 * Stylesheet manager interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
interface StylesheetManagerInterface extends ManagerInterface {

    /**
     * Get the stylesheets.
     *
     * @return mixed[] Returns the stylesheets.
     */
    public function getStylesheets(): array;
}
