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

namespace WBW\Bundle\BootstrapBundle\Tests\Factory\Customize;

use WBW\Bundle\BootstrapBundle\Factory\Customize\ColorFactory;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Component\Color\BlackColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\BlueColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\CyanColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\GreenColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\GreyColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\IndigoColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\OrangeColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\PinkColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\PurpleColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\RedColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\TealColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\WhiteColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\YellowColorInterface;

/**
 * Color factory test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Factory\Customize
 */
class ColorFactoryTest extends AbstractTestCase {

    /**
     * Test newBootstrapPalette()
     *
     * @return void
     */
    public function testNewBootstrapPalette(): void {

        $res = ColorFactory::newBootstrapPalette();
        $this->assertCount(13, $res);

        $i = -1;

        $this->assertInstanceOf(BlueColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(IndigoColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(PurpleColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(PinkColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(RedColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(OrangeColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(YellowColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(GreenColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(TealColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(CyanColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(GreyColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(BlackColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(WhiteColorInterface::class, $res[++$i]);
    }
}
