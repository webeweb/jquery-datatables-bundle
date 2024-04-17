<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity;

use WBW\Bundle\DataTablesBundle\Entity\DataTablesEntityTrait;

/**
 * Test DataTables entity trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider
 */
class TestDataTablesEntityTrait {

    use DataTablesEntityTrait {
        setEntity as public;
    }
}
