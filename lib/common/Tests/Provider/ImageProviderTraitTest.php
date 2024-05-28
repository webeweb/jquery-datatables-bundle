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

namespace WBW\Bundle\CommonBundle\Tests\Provider;

use WBW\Bundle\CommonBundle\Provider\ImageProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\TestImageProviderTrait;

/**
 * Image provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider
 */
class ImageProviderTraitTest extends AbstractTestCase {

    /**
     * Test setProvider()
     *
     * @return void
     */
    public function testSetProvider(): void {

        // Set a Image provider mock.
        $imageProvider = $this->getMockBuilder(ImageProviderInterface::class)->getMock();

        $obj = new TestImageProviderTrait();

        $obj->setImageProvider($imageProvider);
        $this->assertSame($imageProvider, $obj->getImageProvider());
    }
}
