<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\WidgetBundle\Tests\Assets\SyntaxHighlighter;

use WBW\Bundle\WidgetBundle\Assets\SyntaxHighlighter\SyntaxHighlighterDefaults;
use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;

/**
 * SyntaxHighlighter defaults test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\SyntaxHighlighter
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