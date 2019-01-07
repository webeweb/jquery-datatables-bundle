<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\API;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesWrapperTrait;

/**
 * Test DataTables wrapper trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\API
 */
class TestDataTablesWrapperTrait {

    use DataTablesWrapperTrait {
        setWrapper as public;
    }
}
