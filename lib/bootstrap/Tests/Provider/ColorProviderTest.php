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

namespace WBW\Bundle\BootstrapBundle\Tests\Provider;

use WBW\Bundle\BootstrapBundle\Factory\Customize\ColorFactory;
use WBW\Bundle\BootstrapBundle\Provider\ColorProvider;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Color provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Provider
 */
class ColorProviderTest extends AbstractTestCase {

    /**
     * Test getColors()
     *
     * @return void
     */
    public function testGetColors(): void {

        $exp = ColorFactory::newBootstrapPalette();

        $obj = new ColorProvider();

        $this->assertEquals($exp, $obj->getColors());
    }

    /**
     * Test getName()
     *
     * @return void
     */
    public function testGetName(): void {

        $obj = new ColorProvider();

        $this->assertEquals("bootstrap", $obj->getName());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.provider.color", ColorProvider::SERVICE_NAME);
    }
}
