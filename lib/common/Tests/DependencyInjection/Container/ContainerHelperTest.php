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

namespace WBW\Bundle\CommonBundle\Tests\DependencyInjection\Container;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WBW\Bundle\CommonBundle\DependencyInjection\Container\ContainerHelper;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Container helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\DependencyInjection\Container
 */
class ContainerHelperTest extends AbstractTestCase {

    /**
     * Test setParameter()
     *
     * @return void
     */
    public function testSetParameter(): void {

        $arg = [
            "one" => 1,
            "two" => [
                "one" => 1,
                "two" => 2,
            ],
        ];

        $obj = new ContainerBuilder();

        ContainerHelper::setParameter($obj, $arg, "alias", "zero");
        $this->assertCount(0, $obj->getParameterBag()->all());

        ContainerHelper::setParameter($obj, $arg, "alias", "one");
        $this->assertCount(1, $obj->getParameterBag()->all());

        $this->assertEquals(1, $obj->getParameter("alias.one"));

        ContainerHelper::setParameter($obj, $arg, "alias", "two", false);
        $this->assertCount(3, $obj->getParameterBag()->all());

        $this->assertEquals(1, $obj->getParameter("alias.one"));
        $this->assertEquals(1, $obj->getParameter("alias.two.one"));
        $this->assertEquals(2, $obj->getParameter("alias.two.two"));
    }

    /**
     * Test setParameters()
     *
     * @return void
     */
    public function testSetParameters(): void {

        $arg = [
            "one" => 1,
            "two" => 2,
        ];

        $obj = new ContainerBuilder();

        ContainerHelper::setParameters($obj, $arg);
        $this->assertCount(2, $obj->getParameterBag()->all());

        $this->assertEquals(1, $obj->getParameter("one"));
        $this->assertEquals(2, $obj->getParameter("two"));
    }
}
