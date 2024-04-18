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

namespace WBW\Bundle\WidgetBundle\Tests\Component;

use WBW\Bundle\WidgetBundle\Component\ImageInterface;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Tests\Fixtures\Component\TestImageTrait;

/**
 * Image trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Component
 */
class ImageTraitTest extends AbstractTestCase {

    /**
     * Test setImage()
     *
     * @return void
     */
    public function testSetImage(): void {

        // Set an Image mock.
        $image = $this->getMockBuilder(ImageInterface::class)->getMock();

        $obj = new TestImageTrait();

        $obj->setImage($image);
        $this->assertSame($image, $obj->getImage());
    }
}
