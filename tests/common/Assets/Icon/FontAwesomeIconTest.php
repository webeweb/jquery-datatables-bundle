<?php

/*
 * This file is part of the core-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Assets\Icon;

use WBW\Bundle\CommonBundle\Assets\Icon\FontAwesomeIcon;
use WBW\Bundle\CommonBundle\Assets\Icon\FontAwesomeIconInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;

/**
 * Font Awesome icon test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Assets\Icon
 */
class FontAwesomeIconTest extends AbstractTestCase {

    /**
     * Test enumAnimations()
     *
     * @return void
     */
    public function testEnumAnimations(): void {

        $exp = [
            FontAwesomeIconInterface::FONT_AWESOME_ANIMATION_PULSE,
            FontAwesomeIconInterface::FONT_AWESOME_ANIMATION_SPIN,
        ];

        $this->assertEquals($exp, FontAwesomeIcon::enumAnimations());
    }

    /**
     * Test enumFonts()
     *
     * @return void
     */
    public function testEnumFonts(): void {

        $exp = [
            FontAwesomeIconInterface::FONT_AWESOME_FONT,
            FontAwesomeIconInterface::FONT_AWESOME_FONT_BOLD,
            FontAwesomeIconInterface::FONT_AWESOME_FONT_DUOTONE,
            FontAwesomeIconInterface::FONT_AWESOME_FONT_LIGHT,
            FontAwesomeIconInterface::FONT_AWESOME_FONT_REGULAR,
            FontAwesomeIconInterface::FONT_AWESOME_FONT_SOLID,
        ];

        $this->assertEquals($exp, FontAwesomeIcon::enumFonts());
    }

    /**
     * Test enumPulls()
     *
     * @return void
     */
    public function testEnumPulls(): void {

        $exp = [
            FontAwesomeIconInterface::FONT_AWESOME_PULL_LEFT,
            FontAwesomeIconInterface::FONT_AWESOME_PULL_RIGHT,
        ];

        $this->assertEquals($exp, FontAwesomeIcon::enumPulls());
    }

    /**
     * Test the enumSizes() mmethod.
     *
     * @return void
     */
    public function testEnumSizes(): void {

        $exp = [
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_LG,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_SM,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_XS,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_2X,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_3X,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_4X,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_5X,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_6X,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_7X,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_8X,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_9X,
            FontAwesomeIconInterface::FONT_AWESOME_SIZE_10X,
        ];

        $this->assertEquals($exp, FontAwesomeIcon::enumSizes());
    }

    /**
     * Test setAnimation()
     *
     * @return void
     */
    public function testSetAnimation(): void {

        $obj = new FontAwesomeIcon();

        $obj->setAnimation(FontAwesomeIconInterface::FONT_AWESOME_ANIMATION_PULSE);
        $this->assertEquals(FontAwesomeIconInterface::FONT_AWESOME_ANIMATION_PULSE, $obj->getAnimation());
    }

    /**
     * Test setAnimation()
     *
     * @return void
     */
    public function testSetAnimationWithBadArgument(): void {

        $obj = new FontAwesomeIcon();

        $obj->setAnimation("exception");
        $this->assertNotEquals("exception", $obj->getAnimation());
    }

    /**
     * Test setBordered()
     *
     * @return void
     */
    public function testSetBordered(): void {

        $obj = new FontAwesomeIcon();

        $obj->setBordered(true);
        $this->assertTrue($obj->getBordered());
    }

    /**
     * Test setFixedWidth()
     *
     * @return void
     */
    public function testSetFixedWidth(): void {

        $obj = new FontAwesomeIcon();

        $obj->setFixedWidth(true);
        $this->assertTrue($obj->getFixedWidth());
    }

    /**
     * Test setFont()
     *
     * @return void
     */
    public function testSetFont(): void {

        $obj = new FontAwesomeIcon();

        $obj->setFont(FontAwesomeIconInterface::FONT_AWESOME_FONT);
        $this->assertEquals(FontAwesomeIconInterface::FONT_AWESOME_FONT, $obj->getFont());
    }

    /**
     * Test setFont()
     *
     * @return void
     */
    public function testSetFontWithBadArgument(): void {

        $obj = new FontAwesomeIcon();

        $obj->setFont("exception");
        $this->assertNotEquals("exception", $obj->getFont());
    }

    /**
     * Test setPull()
     *
     * @return void
     */
    public function testSetPull(): void {

        $obj = new FontAwesomeIcon();

        $obj->setPull(FontAwesomeIconInterface::FONT_AWESOME_PULL_LEFT);
        $this->assertEquals(FontAwesomeIconInterface::FONT_AWESOME_PULL_LEFT, $obj->getPull());
    }

    /**
     * Test setPull()
     *
     * @return void
     */
    public function testSetPullWithBadArgument(): void {

        $obj = new FontAwesomeIcon();

        $obj->setPull("exception");
        $this->assertNotEquals("exception", $obj->getPull());
    }

    /**
     * Test setSize()
     *
     * @return void
     */
    public function testSetSize(): void {

        $obj = new FontAwesomeIcon();

        $obj->setSize(FontAwesomeIconInterface::FONT_AWESOME_SIZE_LG);
        $this->assertEquals(FontAwesomeIconInterface::FONT_AWESOME_SIZE_LG, $obj->getSize());
    }

    /**
     * Test setSize()
     *
     * @return void
     */
    public function testSetSizeWithBadArgument(): void {

        $obj = new FontAwesomeIcon();

        $obj->setSize("exception");
        $this->assertNotEquals("exception", $obj->getSize());
    }

    /**
     * Test __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new FontAwesomeIcon();

        $this->assertNull($obj->getAnimation());
        $this->assertFalse($obj->getBordered());
        $this->assertFalse($obj->getFixedWidth());
        $this->assertEquals(FontAwesomeIconInterface::FONT_AWESOME_FONT, $obj->getFont());
        $this->assertNull($obj->getPull());
        $this->assertNull($obj->getSize());
    }
}
