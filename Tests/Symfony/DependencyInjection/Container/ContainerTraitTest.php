<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Symfony\DependencyInjection\Container;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\DependencyInjection\Container\TestContainerTrait;

/**
 * Container trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Symfony\DependencyInjection\Container
 */
class ContainerTraitTest extends AbstractTestCase {

    /**
     * Test setContainer()
     *
     * @return void
     */
    public function testSetContainer(): void {

        $obj = new TestContainerTrait();

        $obj->setContainer($this->containerBuilder);
        $this->assertSame($this->containerBuilder, $obj->getContainer());
    }
}
