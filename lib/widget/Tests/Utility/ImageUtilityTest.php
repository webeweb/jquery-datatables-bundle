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

namespace WBW\Bundle\WidgetBundle\Tests\Utility;

use Throwable;
use WBW\Bundle\WidgetBundle\Component\Image\DefaultImage;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Utility\ImageUtility;

/**
 * Image utility test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Utility
 */
class ImageUtilityTest extends AbstractTestCase {

    /**
     * Images.
     *
     * @var string[]|null
     */
    private $images = null;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void {
        parent::setUp();

        // Set the images mocks.
        $this->images = [
            realpath(__DIR__ . "/../Fixtures/Component/Image/DefaultImage_1920x1037.jpg"),
            realpath(__DIR__ . "/../Fixtures/Component/Image/DefaultImage_1920x1037.png"),
            realpath(__DIR__ . "/../Fixtures/Component/Image/DefaultImage_1920x1920.png"),
            realpath(__DIR__ . "/../Fixtures/Component/Image/DefaultImage_1920x3554.png"),
            realpath(__DIR__ . "/../Fixtures/Component/Image/DefaultImage_640x512.svg"),
        ];
    }

    /**
     * Test convertSvgToPng()
     *
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function testConvertSvgToPng(): void {

        // Set a filename mock.
        $filename = $this->images[0];

        $obj = ImageUtility::convertSvgToPng($filename, 640, 512);
        $this->assertNotEmpty($obj);
    }

    /**
     * Test encodeBase64()
     *
     * @return void
     */
    public function testEncodeBase64(): void {

        // Set the mocks.
        $uri = $this->images[0];
        $url = "https://raw.githubusercontent.com/webeweb/core-library/master/tests/image/Fixtures/TestImage_1920x1037.jpg";

        $exp = file_get_contents(__DIR__ . "/../Fixtures/Utility/ImageUtilityTest.testBase64Encode.txt");

        $this->assertEquals($exp, ImageUtility::encodeBase64($uri));
        $this->assertEquals($exp, ImageUtility::encodeBase64($url));

        $this->assertNull(ImageUtility::encodeBase64(null));
    }

    /**
     * Test newInputStream()
     *
     * @return void
     */
    public function testNewInputStream(): void {

        $jpg = new DefaultImage($this->images[0]);
        $png = new DefaultImage($this->images[1]);

        $this->assertNotNull(ImageUtility::newInputStream($jpg));
        $this->assertNotNull(ImageUtility::newInputStream($png));
    }

    /**
     * Test newOutputStream()
     *
     * @return void
     */
    public function testNewOutputStream(): void {

        $jpg = new DefaultImage($this->images[0]);
        $png = new DefaultImage($this->images[1]);

        $this->assertNotNull(ImageUtility::newOutputStream($jpg, 1920, 1080));
        $this->assertNotNull(ImageUtility::newOutputStream($png, 1920, 1080));
    }

    /**
     * Test resize()
     *
     * @return void
     */
    public function testResize(): void {

        // Set the pathname mocks.
        $pathname = [
            __DIR__ . "/../../../../var/ImageUtilityTest.testResize.jpg",
            __DIR__ . "/../../../../var/ImageUtilityTest.testResize.png",
        ];

        if (true === file_exists($pathname[0])) {
            unlink($pathname[0]);
        }
        if (true === file_exists($pathname[1])) {
            unlink($pathname[1]);
        }

        // Set the Image mocks.
        $jpg = new DefaultImage($this->images[0]);
        $png = new DefaultImage($this->images[1]);

        $this->assertTrue(ImageUtility::resize($jpg, 1000, 500, $pathname[0]));
        $this->assertTrue(ImageUtility::resize($png, 1000, 500, $pathname[1]));
    }
}
