<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Provider;

/**
 * DataTables router interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Provider
 */
interface DataTablesRouterInterface {

    /**
     * Get the URL.
     *
     * @return string Returns the URL.
     */
    public function getUrl(): string;
}
