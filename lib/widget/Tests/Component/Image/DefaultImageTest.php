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

namespace WBW\Bundle\WidgetBundle\Tests\Component\Image;

use WBW\Bundle\WidgetBundle\Component\Image\DefaultImage;
use WBW\Bundle\WidgetBundle\Component\ImageInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * Default image test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component\Image
 */
class DefaultImageTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        // Set a pathname mock.
        $pathname = realpath(__DIR__ . "/../../Fixtures/Component/Image/DefaultImage_1920x1037.jpg");

        $filename  = "DefaultImage_1920x1037.jpg";
        $directory = str_replace("/$filename", "", $pathname);

        $obj = new DefaultImage($pathname);

        $this->assertEquals($pathname, $obj->getPathname());

        $this->assertEquals($directory, $obj->getDirectory());
        $this->assertEquals("jpg", $obj->getExtension());
        $this->assertEquals($filename, $obj->getFilename());
        $this->assertEquals(ImageInterface::MIME_TYPE_JPEG, $obj->getMimeType());
        $this->assertEquals(1037, $obj->getHeight());
        $this->assertEquals(118276, $obj->getSize());
        $this->assertEquals(1920, $obj->getWidth());

        $this->assertEquals([1920, 1037], $obj->getDimensions());
        $this->assertEquals(ImageInterface::ORIENTATION_LANDSCAPE, $obj->getOrientation());
        $this->assertEquals(1920 / 1037, $obj->getRatio());
    }
}
