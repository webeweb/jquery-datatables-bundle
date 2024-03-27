<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Translation;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Translation\TestTranslatorTrait;

/**
 * Translator trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Translation
 */
class TranslatorTraitTest extends AbstractTestCase {

    /**
     * Test translate()
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
