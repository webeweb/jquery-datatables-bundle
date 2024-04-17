<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Factory;

use WBW\Bundle\WidgetBundle\Component\Color\AmberColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\BlackColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\BlueColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\BlueGreyColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\BrownColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\CyanColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\DeepOrangeColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\DeepPurpleColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\GreenColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\GreyColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\IndigoColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\LightBlueColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\LightGreenColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\LimeColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\OrangeColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\PinkColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\PurpleColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\RedColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\TealColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\WhiteColorInterface;
use WBW\Bundle\WidgetBundle\Component\Color\YellowColorInterface;
use WBW\Bundle\WidgetBundle\Factory\ColorFactory;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Color factory test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Factory
 */
class ColorFactoryTest extends AbstractTestCase {

    /**
     * Test newMaterialDesignColorPalette()
     *
     * @return void
     */
    public function testNewMaterialDesignColorPalette(): void {

        $res = ColorFactory::newMaterialDesignColorPalette();
        $this->assertCount(21, $res);

        $i = -1;

        $this->assertInstanceOf(RedColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(PinkColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(PurpleColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(DeepPurpleColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(IndigoColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(BlueColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(LightBlueColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(CyanColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(TealColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(GreenColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(LightGreenColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(LimeColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(YellowColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(AmberColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(OrangeColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(DeepOrangeColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(BrownColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(GreyColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(BlueGreyColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(BlackColorInterface::class, $res[++$i]);
        $this->assertInstanceOf(WhiteColorInterface::class, $res[++$i]);
    }
}
