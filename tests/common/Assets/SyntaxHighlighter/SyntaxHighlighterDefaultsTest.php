<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Assets\SyntaxHighlighter;

use WBW\Bundle\CommonBundle\Assets\SyntaxHighlighter\SyntaxHighlighterDefaults;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * SyntaxHighlighter defaults test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Assets\SyntaxHighlighter
 */
class SyntaxHighlighterDefaultsTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new SyntaxHighlighterDefaults();

        $this->assertTrue($obj->getAutoLinks());
        $this->assertEquals("", $obj->getClassName());
        $this->assertFalse($obj->getCollapse());
        $this->assertEquals(1, $obj->getFirstLine());
        $this->assertTrue($obj->getGutter());
        $this->assertEquals([], $obj->getHighlight());
        $this->assertFalse($obj->getHtmlScript());
        $this->assertTrue($obj->getSmartTabs());
        $this->assertEquals(4, $obj->getTabSize());
        $this->assertTrue($obj->getToolbar());
    }
}
