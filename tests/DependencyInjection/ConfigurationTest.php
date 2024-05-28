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

namespace WBW\Bundle\DataTablesBundle\Tests\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use WBW\Bundle\DataTablesBundle\DependencyInjection\Configuration;
use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;

/**
 * Configuration test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\DependencyInjection
 */
class ConfigurationTest extends AbstractTestCase {

    /**
     * Test getConfigTreeBuilder()
     *
     * @return void
     */
    public function testGetConfigTreeBuilder(): void {

        $obj = new Configuration();

        $res = $obj->getConfigTreeBuilder();
        $this->assertInstanceOf(TreeBuilder::class, $res);
    }
}
