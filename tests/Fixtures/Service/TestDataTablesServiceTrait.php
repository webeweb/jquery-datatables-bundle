<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Service;

use WBW\Bundle\DataTablesBundle\Service\DataTablesServiceTrait;

/**
 * Test DataTables service trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Service
 */
class TestDataTablesServiceTrait {

    use DataTablesServiceTrait {
        setDataTablesService as public;
    }
}
