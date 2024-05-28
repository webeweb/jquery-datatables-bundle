<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Provider\Layout;

use DateTime;
use WBW\Bundle\CommonBundle\Provider\Layout\ApplicationLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Provider\Layout\DefaultApplicationLayoutProvider;
use WBW\Bundle\CommonBundle\Provider\LayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Default application layout provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Layout
 */
class DefaultApplicationLayoutProviderTest extends AbstractTestCase {

    /**
     * Test getDescription()
     *
     * @return void
     */
    public function testGetDescription(): void {

        $obj = new DefaultApplicationLayoutProvider();

        $this->assertEquals("Common bundle", $obj->getDescription());
    }

    /**
     * Test getHome()
     *
     * @return void
     */
    public function testGetHome(): void {

        $obj = new DefaultApplicationLayoutProvider();

        $this->assertEquals("/", $obj->getHome());
    }

    /**
     * Test getName()
     *
     * @return void
     */
    public function testGetName(): void {

        $obj = new DefaultApplicationLayoutProvider();

        $this->assertEquals("Common<b>bundle</b>", $obj->getName());
    }

    /**
     * Test getRoute()
     *
     * @return void
     */
    public function testGetRoute(): void {

        $obj = new DefaultApplicationLayoutProvider();

        $this->assertEquals("/", $obj->getRoute());
    }

    /**
     * Test getTitle()
     *
     * @return void
     */
    public function testGetTitle(): void {

        $obj = new DefaultApplicationLayoutProvider();

        $this->assertEquals("Common bundle", $obj->getTitle());
    }

    /**
     * Test getVersion()
     *
     * @return void
     */
    public function testGetVersion(): void {

        $obj = new DefaultApplicationLayoutProvider();

        $this->assertEquals("dev-master", $obj->getVersion());
    }

    /**
     * Test getYear()
     *
     * @return void
     */
    public function testGetYear(): void {

        // Set a Date/time mock.
        $now = new DateTime();

        $obj = new DefaultApplicationLayoutProvider();

        $this->assertEquals("2018-{$now->format("Y")}", $obj->getYear());

        $this->assertEquals("2019-{$now->format("Y")}", $obj->getYear("2019"));
        $this->assertEquals("2020-{$now->format("Y")}", $obj->getYear("2020"));
        $this->assertEquals("{$now->format("Y")}", $obj->getYear($now->format("Y")));
        $this->assertEquals("{$now->format("Y")}", $obj->getYear((string) (intval($now->format("Y")) + 1)));
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new DefaultApplicationLayoutProvider();

        $this->assertInstanceOf(LayoutProviderInterface::class, $obj);
        $this->assertInstanceOf(ApplicationLayoutProviderInterface::class, $obj);
    }
}
