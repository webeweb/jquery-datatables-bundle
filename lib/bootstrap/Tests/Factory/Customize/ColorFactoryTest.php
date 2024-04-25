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
use WBW\Library\Widget\Component\Color\BlackColorInterface;
use WBW\Library\Widget\Component\Color\BlueColorInterface;
use WBW\Library\Widget\Component\Color\CyanColorInterface;
use WBW\Library\Widget\Component\Color\GreenColorInterface;
use WBW\Library\Widget\Component\Color\GreyColorInterface;
use WBW\Library\Widget\Component\Color\IndigoColorInterface;
use WBW\Library\Widget\Component\Color\OrangeColorInterface;
use WBW\Library\Widget\Component\Color\PinkColorInterface;
use WBW\Library\Widget\Component\Color\PurpleColorInterface;
use WBW\Library\Widget\Component\Color\RedColorInterface;
use WBW\Library\Widget\Component\Color\TealColorInterface;
use WBW\Library\Widget\Component\Color\WhiteColorInterface;
use WBW\Library\Widget\Component\Color\YellowColorInterface;

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
