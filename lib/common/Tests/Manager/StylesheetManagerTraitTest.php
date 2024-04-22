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

use WBW\Bundle\CommonBundle\Manager\StylesheetManagerInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Manager\TestStylesheetManagerTrait;

/**
 * Stylesheet manager trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Manager
 */
class StylesheetManagerTraitTest extends AbstractTestCase {

    /**
     * Test setStylesheetManager()
     *
     * @return void
     */
    public function testSetStylesheetManager(): void {

        // Set a Stylesheet manager mock.
        $stylesheetManager = $this->getMockBuilder(StylesheetManagerInterface::class)->getMock();

        $obj = new TestStylesheetManagerTrait();

        $obj->setStylesheetManager($stylesheetManager);
        $this->assertSame($stylesheetManager, $obj->getStylesheetManager());
    }
}
