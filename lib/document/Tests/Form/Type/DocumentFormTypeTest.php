<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Tests\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use WBW\Bundle\CommonBundle\Tests\DefaultFormTypeTestCase;
use WBW\Bundle\DocumentBundle\DependencyInjection\WBWDocumentExtension;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Form\Type\DocumentFormType;
use WBW\Bundle\DocumentBundle\WBWDocumentBundle;

/**
 * Document form type test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Form\Type
 */
class DocumentFormTypeTest extends DefaultFormTypeTestCase {

    /**
     * Test buildForm()
     *
     * @return void
     */
    public function testBuildForm(): void {

        $obj = new DocumentFormType();

        $obj->buildForm($this->formBuilder, [
            "disabled" => false,
        ]);

        $this->assertCount(1, $this->children);

        $this->assertArrayHasKey("name", $this->children);
        $this->assertEquals(TextType::class, $this->children["name"]["type"]);
        $this->assertFalse($this->children["name"]["options"]["disabled"]);
        $this->assertEquals("label.name", $this->children["name"]["options"]["label"]);
        $this->assertFalse($this->children["name"]["options"]["required"]);
        $this->assertTrue($this->children["name"]["options"]["trim"]);
    }

    /**
     * Test configureOptions()
     *
     * @return void
     */
    public function testConfigureOptions(): void {

        $obj = new DocumentFormType();

        $obj->configureOptions($this->resolver);

        $res = [
            "data_class"         => Document::class,
            "translation_domain" => WBWDocumentBundle::getTranslationDomain(),
        ];
        $this->assertEquals($res, $this->defaults);
    }

    /**
     * Test getBlockPrefix() method.
     *
     * @return void
     */
    public function testGetBlockPrefix(): void {

        $obj = new DocumentFormType();

        $this->assertEquals(WBWDocumentExtension::EXTENSION_ALIAS . "_document", $obj->getBlockPrefix());
    }
}
