<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use WBW\Bundle\BootstrapBundle\DependencyInjection\Configuration;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Configuration test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\DependencyInjection
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
