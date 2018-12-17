<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Manager;

use WBW\Bundle\JQuery\DataTablesBundle\Manager\DataTablesManagerTrait;

/**
 * Test DataTables manager trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Manager
 */
class TestDataTablesManagerTrait {

    use DataTablesManagerTrait {
        setDataTablesManager as public;
    }
}
