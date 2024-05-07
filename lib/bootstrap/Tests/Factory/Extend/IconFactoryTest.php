<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Factory\Extend;

use WBW\Bundle\BootstrapBundle\Extend\FontAwesomeIconInterface;
use WBW\Bundle\BootstrapBundle\Extend\MaterialDesignIconicFontIconInterface;
use WBW\Bundle\BootstrapBundle\Factory\Extend\IconFactory;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;

/**
 * Icon factory test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Factory\Extend
 */
class IconFactoryTest extends AbstractTestCase {

    /**
     * Test newFontAwesomeIcon()
     *
     * @return void
     */
    public function testNewFontAwesomeIcon(): void {

        $obj = IconFactory::newFontAwesomeIcon();
        $this->assertInstanceOf(FontAwesomeIconInterface::class, $obj);
    }

    /**
     * Test newMaterialDesignIconicFontIcon()
     *
     * @return void
     */
    public function testNewMaterialDesignIconicFontIcon(): void {

        $obj = IconFactory::newMaterialDesignIconicFontIcon();
        $this->assertInstanceOf(MaterialDesignIconicFontIconInterface::class, $obj);
    }

    /**
     * Test parseFontAwesomeIcon()
     *
     * @return void
     */
    public function testParseFontAwesomeIcon(): void {

        // Set the arguments mock.
        $arg = [
            "name"       => "home",
            "style"      => "color: #000000;",
            "animation"  => "spin",
            "bordered"   => true,
            "fixedWidth" => true,
            "font"       => "s",
            "pull"       => "left",
            "size"       => "lg",
        ];

        $obj = IconFactory::parseFontAwesomeIcon($arg);
        $this->assertInstanceOf(FontAwesomeIconInterface::class, $obj);

        $this->assertEquals($arg["name"], $obj->getName());
        $this->assertEquals($arg["style"], $obj->getStyle());

        $this->assertEquals($arg["animation"], $obj->getAnimation());
        $this->assertEquals($arg["bordered"], $obj->getBordered());
        $this->assertEquals($arg["fixedWidth"], $obj->getFixedWidth());
        $this->assertEquals($arg["font"], $obj->getFont());
        $this->assertEquals($arg["pull"], $obj->getPull());
        $this->assertEquals($arg["size"], $obj->getSize());
    }

    /**
     * Test parseMaterialDesignIconicFontIcon()
     *
     * @return void
     */
    public function testParseMaterialDesignIconicFontIcon(): void {

        // Set the arguments mock.
        $arg = [
            "name"       => "home",
            "style"      => "color: #000000;",
            "border"     => "border",
            "fixedWidth" => true,
            "flip"       => "horizontal",
            "pull"       => "left",
            "rotate"     => "90",
            "size"       => "lg",
            "spin"       => "spin",
        ];

        $obj = IconFactory::parseMaterialDesignIconicFontIcon($arg);
        $this->assertNotNull($obj);
        $this->assertInstanceOf(MaterialDesignIconicFontIconInterface::class, $obj);

        $this->assertEquals($arg["name"], $obj->getName());
        $this->assertEquals($arg["style"], $obj->getStyle());

        $this->assertEquals($arg["border"], $obj->getBorder());
        $this->assertEquals($arg["fixedWidth"], $obj->getFixedWidth());
        $this->assertEquals($arg["flip"], $obj->getFlip());
        $this->assertEquals($arg["pull"], $obj->getPull());
        $this->assertEquals($arg["rotate"], $obj->getRotate());
        $this->assertEquals($arg["size"], $obj->getSize());
        $this->assertEquals($arg["spin"], $obj->getSpin());
    }
}
