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

namespace WBW\Bundle\CommonBundle\Tests\Translation;

use Symfony\Contracts\Translation\TranslatorInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Translation\TestTranslatorTrait;

/**
 * Translator trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Translation
 */
class TranslatorTraitTest extends AbstractTestCase {

    /**
     * Test setTranslator()
     *
     * @return void
     */
    public function testSetTranslator(): void {

        // Set a Translator mock.
        $translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();

        $obj = new TestTranslatorTrait();

        $obj->setTranslator($translator);
        $this->assertSame($translator, $obj->getTranslator());
    }

    /**
     * Test translate()
     *
     * @return void
     */
    public function testTranslate(): void {

        // Set a Translator mock.
        $translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();
        $translator->expects($this->any())->method("trans")->willReturn("#");

        $obj = new TestTranslatorTrait();

        $obj->setTranslator($translator);
        $this->assertEquals("#", $obj->translate("id"));

        $obj->setTranslator(null);
        $this->assertEquals("id", $obj->translate("id"));
    }
}
