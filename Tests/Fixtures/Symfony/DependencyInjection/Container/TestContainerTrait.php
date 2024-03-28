<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\DependencyInjection\Container;

use WBW\Bundle\DataTablesBundle\Symfony\DependencyInjection\Container\ContainerTrait;

/**
 * Test container trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\DependencyInjection\Container
 */
class TestContainerTrait {

    use ContainerTrait {
        setContainer as public;
    }
}
