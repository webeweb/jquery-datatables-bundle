<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Tests\Form\Type\Document;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use WBW\Bundle\CommonBundle\Tests\DefaultFormTypeTestCase;
use WBW\Bundle\DocumentBundle\DependencyInjection\WBWDocumentExtension;
use WBW\Bundle\DocumentBundle\Entity\Document;
use WBW\Bundle\DocumentBundle\Form\Type\Document\MoveDocumentFormType;
use WBW\Bundle\DocumentBundle\WBWDocumentBundle;

/**
 * Move document type test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Tests\Form\Type\Document
 */
class MoveDocumentFormTypeTest extends DefaultFormTypeTestCase {

    /**
     * Test buildForm()
     *
     * @return void
     */
    public function testBuildForm(): void {

        $obj = new MoveDocumentFormType();

        $obj->buildForm($this->formBuilder, [
            "disabled"      => false,
            "entity.parent" => [],
        ]);

        $this->assertCount(1, $this->children);

        $this->assertArrayHasKey("parent", $this->children);
        $this->assertEquals(EntityType::class, $this->children["parent"]["type"]);
        $this->assertFalse($this->children["parent"]["options"]["disabled"]);
        $this->assertEquals("label.parent", $this->children["parent"]["options"]["label"]);
        $this->assertFalse($this->children["parent"]["options"]["required"]);
    }

    /**
     * Test configureOptions()
     *
     * @return void
     */
    public function testConfigureOptions(): void {

        $obj = new MoveDocumentFormType();

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

        $obj = new MoveDocumentFormType();

        $this->assertEquals(WBWDocumentExtension::EXTENSION_ALIAS . "_document_move", $obj->getBlockPrefix());
    }

    /**
     * Test onPreSetData()
     *
     * @return void
     */
    public function testOnPreSetData(): void {

        // Set a Document mock.
        $document = new Document();
        $document->setParent(new Document());

        // Set a Form event mock.
        $formEvent = new FormEvent($this->form, $document);

        $obj = new MoveDocumentFormType();

        $this->assertSame($formEvent, $obj->onPreSetData($formEvent));
        $this->assertSame($document->getParent(), $document->getSavedParent());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("wbw.document.form.type.document.move", MoveDocumentFormType::SERVICE_NAME);
    }
}
