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

namespace WBW\Bundle\WidgetBundle\Tests\Component;

use InvalidArgumentException;
use Throwable;
use WBW\Bundle\WidgetBundle\Component\ImageInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\TestImage;

/**
 * Image test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class AbstractImageTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        // Set a pathname mock.
        $pathname = realpath(__DIR__ . "/../Fixtures/Component/Image/DefaultImage_1920x1037.jpg");

        $obj = new TestImage($pathname);

        $this->assertInstanceOf(ImageInterface::class, $obj);

        $this->assertEquals($pathname, $obj->getPathname());

        $this->assertNull($obj->getDirectory());
        $this->assertNull($obj->getExtension());
        $this->assertNull($obj->getFilename());
        $this->assertNull($obj->getMimeType());
        $this->assertNull($obj->getHeight());
        $this->assertNull($obj->getSize());
        $this->assertNull($obj->getWidth());

        $this->assertEquals([null, null], $obj->getDimensions());
        $this->assertNull($obj->getOrientation());
        $this->assertNull($obj->getRatio());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__constructWithInvalidArgumentException(): void {

        // Set a pathname mock.
        $pathname = getcwd() . "/exception.txt";

        try {

            new TestImage($pathname);
        } catch (Throwable $ex) {

            $this->assertInstanceOf(InvalidArgumentException::class, $ex);
            $this->assertEquals("The image \"$pathname\" was not found", $ex->getMessage());
        }
    }
}
