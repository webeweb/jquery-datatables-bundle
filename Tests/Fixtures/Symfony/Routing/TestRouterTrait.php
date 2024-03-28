<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\Routing;

use WBW\Bundle\DataTablesBundle\Symfony\Routing\RouterTrait;

/**
 * Test router trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\Routing
 */
class TestRouterTrait {

    use RouterTrait {
        setRouter as public;
    }
}
