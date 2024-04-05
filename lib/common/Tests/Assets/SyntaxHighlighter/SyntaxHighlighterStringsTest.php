<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Assets\SyntaxHighlighter;

use WBW\Bundle\CommonBundle\Assets\SyntaxHighlighter\SyntaxHighlighterStrings;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * SyntaxHightlighter strings test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Assets\SyntaxHighlighter
 */
class SyntaxHighlighterStringsTest extends AbstractTestCase {

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new SyntaxHighlighterStrings();

        $this->assertEquals("SyntaxHighlighter\n\n", $obj->getAlert());
        $this->assertEquals("Brush wasn't made for html-script option:", $obj->getBrushNotHtmlScript());
        $this->assertEquals("copy to clipboard", $obj->getCopyToClipboard());
        $this->assertEquals("The code is in your clipboard now", $obj->getCopyToClipboardConfirmation());
        $this->assertEquals("+ expand source", $obj->getExpandSource());
        $this->assertEquals("?", $obj->getHelp());
        $this->assertEquals("Can't find brush for:", $obj->getNoBrush());
        $this->assertEquals("print", $obj->getPrint());
        $this->assertEquals("view source", $obj->getViewSource());
    }
}
