<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Manager;

use WBW\Bundle\DataTablesBundle\Manager\DataTablesManagerTrait;

/**
 * Test DataTables manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Manager
 */
class TestDataTablesManagerTrait {

    use DataTablesManagerTrait {
        setDataTablesManager as public;
    }
}
