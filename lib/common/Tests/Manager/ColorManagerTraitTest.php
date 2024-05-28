<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use WBW\Bundle\CommonBundle\Manager\ColorManagerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Manager\TestColorManagerTrait;

/**
 * Color manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class ColorManagerTraitTest extends AbstractTestCase {

    /**
     * Test setColorManager()
     *
     * @return void
     */
    public function testSetColorManager(): void {

        // Set a Color manager mock.
        $colorManager = $this->getMockBuilder(ColorManagerInterface::class)->getMock();

        $obj = new TestColorManagerTrait();

        $obj->setColorManager($colorManager);
        $this->assertSame($colorManager, $obj->getColorManager());
    }
}
