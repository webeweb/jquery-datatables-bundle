<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Helper;

use WBW\Bundle\WidgetBundle\Component\ImageInterface;
use WBW\Bundle\WidgetBundle\Helper\ImageHelper;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Image helper test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Helper
 */
class ImageHelperTest extends AbstractTestCase {

    /**
     * Test getDimensions()
     *
     * @return void
     */
    public function testGetDimensions(): void {

        // Set an Image mock.
        $image = $this->getMockBuilder(ImageInterface::class)->getMock();
        $image->expects($this->any())->method("getWidth")->willReturn(1920);
        $image->expects($this->any())->method("getHeight")->willReturn(1080);

        $exp = [1920, 1080];

        $this->assertEquals($exp, ImageHelper::getDimensions($image));
    }

    /**
     * Test getOrientation()
     *
     * @return void
     */
    public function testGetOrientation(): void {

        $this->assertNull(ImageHelper::getOrientation(null, null));
        $this->assertEquals(ImageInterface::ORIENTATION_LANDSCAPE, ImageHelper::getOrientation(1920, 1080));
        $this->assertEquals(ImageInterface::ORIENTATION_PORTRAIT, ImageHelper::getOrientation(1080, 1920));
        $this->assertEquals(ImageInterface::ORIENTATION_SQUARISH, ImageHelper::getOrientation(1920, 1920));
    }

    /**
     * Test getRatio()
     *
     * @return void
     */
    public function testGetRatio(): void {

        $this->assertNull(ImageHelper::getRatio(null, null));
        $this->assertNull(ImageHelper::getRatio(null, 1280));
        $this->assertNull(ImageHelper::getRatio(1920, null));

        $this->assertEquals(1, ImageHelper::getRatio(1920, 1920));
        $this->assertEquals(1.5, ImageHelper::getRatio(1920, 1280));
        $this->assertEquals(0.6666666666666666, ImageHelper::getRatio(1280, 1920));
    }

    /**
     * Test resize()
     *
     * @return void
     */
    public function testResize(): void {

        $this->assertNull(ImageHelper::resize(null, null, null, null));
        $this->assertNull(ImageHelper::resize(null, 1280, 1920, 1280));
        $this->assertNull(ImageHelper::resize(1920, null, 1920, 1280));
        $this->assertNull(ImageHelper::resize(1920, 1280, null, 1280));
        $this->assertNull(ImageHelper::resize(1920, 1280, 1920, null));

        // Landscape
        $this->assertEquals([1920, 1280], ImageHelper::resize(6000, 4000, 1920, 1280));
        $this->assertEquals([1920, 1280], ImageHelper::resize(6000, 4000, 1280, 1920));
        $this->assertEquals([1920, 1280], ImageHelper::resize(6000, 4000, 1920, 1920));

        $this->assertEquals([1920, 1280], ImageHelper::resize(1920, 1280, 6000, 4000));
        $this->assertEquals([1920, 1280], ImageHelper::resize(1920, 1280, 4000, 6000));
        $this->assertEquals([1920, 1280], ImageHelper::resize(1920, 1280, 6000, 6000));

        // Portrait
        $this->assertEquals([1280, 1920], ImageHelper::resize(4000, 6000, 1280, 1920));
        $this->assertEquals([1280, 1920], ImageHelper::resize(4000, 6000, 1920, 1280));
        $this->assertEquals([1280, 1920], ImageHelper::resize(4000, 6000, 1920, 1920));

        $this->assertEquals([1280, 1920], ImageHelper::resize(1280, 1920, 4000, 6000));
        $this->assertEquals([1280, 1920], ImageHelper::resize(1280, 1920, 6000, 4000));
        $this->assertEquals([1280, 1920], ImageHelper::resize(1280, 1920, 6000, 6000));

        // Squarish
        $this->assertEquals([1920, 1920], ImageHelper::resize(6000, 6000, 1920, 1280));
        $this->assertEquals([1920, 1920], ImageHelper::resize(6000, 6000, 1280, 1920));
        $this->assertEquals([1920, 1920], ImageHelper::resize(6000, 6000, 1920, 1920));

        $this->assertEquals([1920, 1920], ImageHelper::resize(1920, 1920, 6000, 4000));
        $this->assertEquals([1920, 1920], ImageHelper::resize(1920, 1920, 4000, 6000));
        $this->assertEquals([1920, 1920], ImageHelper::resize(1920, 1920, 6000, 6000));
    }
}
