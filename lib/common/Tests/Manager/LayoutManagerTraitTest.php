<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use WBW\Bundle\CommonBundle\Manager\LayoutManagerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Manager\TestLayoutManagerTrait;

/**
 * Layout manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class LayoutManagerTraitTest extends AbstractTestCase {

    /**
     * Test setLayoutManager()
     *
     * @return void
     */
    public function testSetLayoutManager(): void {

        // Set a Layout manager mock.
        $layoutManager = $this->getMockBuilder(LayoutManagerInterface::class)->getMock();

        $obj = new TestLayoutManagerTrait();

        $obj->setLayoutManager($layoutManager);
        $this->assertSame($layoutManager, $obj->getLayoutManager());
    }
}
