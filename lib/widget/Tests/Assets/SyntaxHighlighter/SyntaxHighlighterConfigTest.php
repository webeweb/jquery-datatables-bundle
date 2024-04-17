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

use WBW\Bundle\WidgetBundle\Tests\AbstractTestCase;
use WBW\Bundle\WidgetBundle\Assets\SyntaxHighlighter\SyntaxHighlighterConfig;
use WBW\Bundle\WidgetBundle\Assets\SyntaxHighlighter\SyntaxHighlighterStrings;

/**
 * SyntaxHighlighter config test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\WidgetBundle\Tests\Assets\SyntaxHighlighter
 */
class SyntaxHighlighterConfigTest extends AbstractTestCase {

    /**
     * Test setStrings()
     *
     * @return void
     */
    public function testSetStrings(): void {

        // Set a SyntaxHighlighter strings mock.
        $strings = new SyntaxHighlighterStrings();

        $obj = new SyntaxHighlighterConfig();

        $obj->setStrings($strings);
        $this->assertSame($strings, $obj->getStrings());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new SyntaxHighlighterConfig();

        $this->assertFalse($obj->getBloggerMode());
        $this->assertNull($obj->getStrings());
        $this->assertFalse($obj->getStripBrs());
        $this->assertEquals("pre", $obj->getTagName());
    }
}
