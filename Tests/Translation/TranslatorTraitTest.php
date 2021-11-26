<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Translation;

use WBW\Bundle\JQuery\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Translation\TestTranslatorTrait;

/**
 * Translator trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Translation
 */
class TranslatorTraitTest extends AbstractTestCase {

    /**
     * Tests the translate() method.
     *
     * @return void
     */
    public function testTranslate(): void {

        $obj = new TestTranslatorTrait();

        $this->assertEquals("", $obj->translate(null));

        $this->assertEquals("id", $obj->translate("id"));

        $obj->setTranslator($this->translator);
        $this->assertEquals("id", $obj->translate("id"));
    }
}