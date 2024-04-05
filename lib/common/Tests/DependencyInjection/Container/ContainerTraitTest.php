<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\DependencyInjection\Container;

use Symfony\Component\DependencyInjection\ContainerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\DependencyInjection\Container\TestContainerTrait;

/**
 * Container trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection\Container
 */
class ContainerTraitTest extends AbstractTestCase {

    /**
     * Test setContainer()
     *
     * @return void
     */
    public function testSetContainer(): void {

        // Set a Container mock.
        $container = $this->getMockBuilder(ContainerInterface::class)->getMock();

        $obj = new TestContainerTrait();

        $obj->setContainer($container);
        $this->assertSame($container, $obj->getContainer());
    }
}
