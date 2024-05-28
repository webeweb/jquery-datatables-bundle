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

namespace WBW\Bundle\BootstrapBundle\Tests\Extend;

use JsonSerializable;
use WBW\Bundle\BootstrapBundle\Extend\MaterialDesignIconicFontIcon;
use WBW\Bundle\BootstrapBundle\Extend\MaterialDesignIconicFontIconInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Library\Widget\Component\IconInterface;

/**
 * Material Design Iconic Font icon test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Extend
 */
class MaterialDesignIconicFontIconTest extends AbstractTestCase {

    /**
     * Test enumBorders()
     *
     * @return void.
     */
    public function testEnumBorders(): void {

        $exp = [
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_BORDER,
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_BORDER_CIRCLE,
        ];

        $this->assertEquals($exp, MaterialDesignIconicFontIcon::enumBorders());
    }

    /**
     * Test enumFlips()
     *
     * @return void
     */
    public function testEnumFlips(): void {

        $exp = [
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_FLIP_HORIZONTAL,
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_FLIP_VERTICAL,
        ];

        $this->assertEquals($exp, MaterialDesignIconicFontIcon::enumFlips());
    }

    /**
     * Test enumPulls()
     *
     * @return void
     */
    public function testEnumPulls(): void {

        $exp = [
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_PULL_LEFT,
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_PULL_RIGHT,
        ];

        $this->assertEquals($exp, MaterialDesignIconicFontIcon::enumPulls());
    }

    /**
     * Test enumRotates()
     *
     * @return void
     */
    public function testEnumRotates(): void {

        $exp = [
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_90,
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_180,
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_270,
        ];

        $this->assertEquals($exp, MaterialDesignIconicFontIcon::enumRotates());
    }

    /**
     * Test enumSizes()
     *
     * @return void
     */
    public function testEnumSizes(): void {

        $exp = [
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_LG,
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_2X,
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_3X,
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_4X,
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_5X,
        ];

        $this->assertEquals($exp, MaterialDesignIconicFontIcon::enumSizes());
    }

    /**
     * Test enumSpins()
     *
     * @return void
     */
    public function testEnumSpins(): void {

        $exp = [
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SPIN,
            MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SPIN_REVERSE,
        ];

        $this->assertEquals($exp, MaterialDesignIconicFontIcon::enumSpins());
    }

    /**
     * Test jsonSerialize()
     *
     * @return void
     */
    public function testJsonSerialize(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $this->assertIsArray($obj->jsonSerialize());
    }

    /**
     * Test setBorder()
     *
     * @return void
     */
    public function testSetBorder(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setBorder(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_BORDER);
        $this->assertEquals(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_BORDER, $obj->getBorder());
    }

    /**
     * Test setBorder()
     *
     * @return void
     */
    public function testSetBorderWithBadArgument(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setBorder("exception");
        $this->assertNotEquals("exception", $obj->getBorder());
    }

    /**
     * Test setFixedWidth()
     *
     * @return void
     */
    public function testSetFixedWidth(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setFixedWidth(true);
        $this->assertTrue($obj->getFixedWidth());
    }

    /**
     * Test setFlip()
     *
     * @return void
     */
    public function testSetFlip(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setFlip(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_FLIP_HORIZONTAL);
        $this->assertEquals(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_FLIP_HORIZONTAL, $obj->getFlip());
    }

    /**
     * Test setFlip()
     *
     * @return void
     */
    public function testSetFlipWithBadArgument(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setFlip("exception");
        $this->assertNotEquals("exception", $obj->getFlip());
    }

    /**
     * Test setPull()
     *
     * @return void
     */
    public function testSetPull(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setPull(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_PULL_LEFT);
        $this->assertEquals(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_PULL_LEFT, $obj->getPull());
    }

    /**
     * Test setPull()
     *
     * @return void
     */
    public function testSetPullWithBadArgument(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setPull("exception");
        $this->assertNotEquals("exception", $obj->getPull());
    }

    /**
     * Test setRotate()
     *
     * @return void
     */
    public function testSetRotate(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setRotate(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_90);
        $this->assertEquals(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_ROTATE_90, $obj->getRotate());
    }

    /**
     * Test setRotate()
     *
     * @return void
     */
    public function testSetRotateWithBadArgument(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setRotate("exception");
        $this->assertNotEquals("exception", $obj->getRotate());
    }

    /**
     * Test setSize()
     *
     * @return void
     */
    public function testSetSize(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setSize(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_LG);
        $this->assertEquals(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SIZE_LG, $obj->getSize());
    }

    /**
     * Test setSize()
     *
     * @return void
     */
    public function testSetSizeWithBadArgument(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setSize("exception");
        $this->assertNotEquals("exception", $obj->getSize());
    }

    /**
     * Test setSpin()
     *
     * @return void
     */
    public function testSetSpin(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setSpin(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SPIN);
        $this->assertEquals(MaterialDesignIconicFontIconInterface::MATERIAL_DESIGN_ICONIC_FONT_SPIN, $obj->getSpin());
    }

    /**
     * Test setSpin()
     *
     * @return void
     */
    public function testSetSpinWithBadArgument(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $obj->setSpin("exception");
        $this->assertNotEquals("exception", $obj->getSpin());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new MaterialDesignIconicFontIcon();

        $this->assertInstanceOf(JsonSerializable::class, $obj);
        $this->assertInstanceOf(IconInterface::class, $obj);
        $this->assertInstanceOf(MaterialDesignIconicFontIconInterface::class, $obj);

        $this->assertNull($obj->getBorder());
        $this->assertFalse($obj->getFixedWidth());
        $this->assertNull($obj->getFlip());
        $this->assertNull($obj->getPull());
        $this->assertNull($obj->getRotate());
        $this->assertNull($obj->getSize());
        $this->assertNull($obj->getSpin());
    }
}
