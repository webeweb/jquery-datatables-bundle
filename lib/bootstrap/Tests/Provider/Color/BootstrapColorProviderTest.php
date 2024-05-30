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

namespace WBW\Bundle\BootstrapBundle\Tests\Provider\Color;

use WBW\Bundle\BootstrapBundle\Factory\Customize\ColorFactory;
use WBW\Bundle\BootstrapBundle\Provider\Color\BootstrapColorProvider;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Provider\ColorProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;

/**
 * Bootstrap color provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Provider\Color
 */
class BootstrapColorProviderTest extends AbstractTestCase {

    /**
     * Test getColors()
     *
     * @return void
     */
    public function testGetColors(): void {

        $exp = ColorFactory::newBootstrapPalette();

        $obj = new BootstrapColorProvider();

        $this->assertEquals($exp, $obj->getColors());
    }

    /**
     * Test getName()
     *
     * @return void
     */
    public function testGetName(): void {

        $obj = new BootstrapColorProvider();

        $this->assertEquals(BootstrapColorProvider::PROVIDER_NAME, $obj->getName());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.bootstrap.provider.color.bootstrap", BootstrapColorProvider::SERVICE_NAME);
        $this->assertEquals("bootstrap", BootstrapColorProvider::PROVIDER_NAME);

        $obj = new BootstrapColorProvider();

        $this->assertInstanceOf(ProviderInterface::class, $obj);
        $this->assertInstanceOf(ColorProviderInterface::class, $obj);
    }
}
