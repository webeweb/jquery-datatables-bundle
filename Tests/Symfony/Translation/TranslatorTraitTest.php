<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Symfony\Translation;

use WBW\Bundle\DataTablesBundle\Tests\AbstractTestCase;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Symfony\Translation\TestTranslatorTrait;

/**
 * Translator trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Symfony\Translation
 */
class TranslatorTraitTest extends AbstractTestCase {

    /**
     * Test setTranslator()
     *
     * @return void
     */
    public function testSetTranslator(): void {

        $obj = new TestTranslatorTrait();

        $obj->setTranslator($this->translator);
        $this->assertSame($this->translator, $obj->getTranslator());
    }
}
