<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Traits\Arrays;

use WBW\Bundle\JQuery\DataTablesBundle\Traits\Arrays\ArrayEntitiesTrait;

/**
 * Test array entities trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Traits\Arrays
 */
class TestArrayEntitiesTrait {

    use ArrayEntitiesTrait {
        setEntities as public;
    }
}
