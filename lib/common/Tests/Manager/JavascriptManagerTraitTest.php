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

namespace WBW\Bundle\CommonBundle\Tests\Manager;

use WBW\Bundle\CommonBundle\Manager\JavascriptManagerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Manager\TestJavascriptManagerTrait;

/**
 * Javascript manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class JavascriptManagerTraitTest extends AbstractTestCase {

    /**
     * Test setJavascriptManager()
     *
     * @return void
     */
    public function testSetJavascriptManager(): void {

        // Set a Javascript manager mock.
        $javascriptManager = $this->getMockBuilder(JavascriptManagerInterface::class)->getMock();

        $obj = new TestJavascriptManagerTrait();

        $obj->setJavascriptManager($javascriptManager);
        $this->assertSame($javascriptManager, $obj->getJavascriptManager());
    }
}
