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

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Model;

use WBW\Bundle\DataTablesBundle\Model\DataTablesWrapperTrait;

/**
 * Test DataTables wrapper trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Model
 */
class TestDataTablesWrapperTrait {

    use DataTablesWrapperTrait {
        setWrapper as public;
    }
}
