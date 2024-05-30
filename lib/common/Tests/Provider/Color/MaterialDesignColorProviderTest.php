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

namespace WBW\Bundle\CommonBundle\Tests\Provider\Color;

use WBW\Bundle\CommonBundle\Provider\Color\MaterialDesignColorProvider;
use WBW\Bundle\CommonBundle\Provider\Color\MaterialDesignColorProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ColorProviderInterface;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Library\Widget\Factory\ColorFactory;

/**
 * Material Design color provider test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Provider
 */
class MaterialDesignColorProviderTest extends AbstractTestCase {

    /**
     * Test getColors()
     *
     * @return void
     */
    public function testGetColors(): void {

        $exp = ColorFactory::newMaterialDesignColorPalette();

        $obj = new MaterialDesignColorProvider();

        $this->assertEquals($exp, $obj->getColors());
    }

    /**
     * Test getName()
     *
     * @return void
     */
    public function testGetName(): void {

        $obj = new MaterialDesignColorProvider();

        $this->assertEquals(MaterialDesignColorProvider::PROVIDER_NAME, $obj->getName());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.common.provider.color.material_design", MaterialDesignColorProvider::SERVICE_NAME);
        $this->assertEquals("material_design", MaterialDesignColorProvider::PROVIDER_NAME);

        $obj = new MaterialDesignColorProvider();

        $this->assertInstanceOf(ProviderInterface::class, $obj);
        $this->assertInstanceOf(ColorProviderInterface::class, $obj);
        $this->assertInstanceOf(MaterialDesignColorProviderInterface::class, $obj);
    }
}
