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

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use WBW\Bundle\CommonBundle\Manager\ImageManagerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Manager\TestImageManagerTrait;

/**
 * Image manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class ImageManagerTraitTest extends AbstractTestCase {

    /**
     * Test setImageManager()
     *
     * @return void
     */
    public function testSetImageManager(): void {

        // Set a Image manager mock.
        $imageManager = $this->getMockBuilder(ImageManagerInterface::class)->getMock();

        $obj = new TestImageManagerTrait();

        $obj->setImageManager($imageManager);
        $this->assertSame($imageManager, $obj->getImageManager());
    }
}
