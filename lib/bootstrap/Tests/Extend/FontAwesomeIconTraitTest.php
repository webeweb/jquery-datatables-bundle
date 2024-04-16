<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Extend;

use WBW\Bundle\BootstrapBundle\Extend\FontAwesomeIconInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Extend\TestFontAwesomeIconTrait;

/**
 * Font Awesome icon trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Extend
 */
class FontAwesomeIconTraitTest extends AbstractTestCase {

    /**
     * Test setFontAwesomeIcon()
     *
     * @return void
     */
    public function testSetFontAwesomeIcon(): void {

        // Set a Font Awesome icon mock.
        $fontAwesomeIcon = $this->getMockBuilder(FontAwesomeIconInterface::class)->getMock();

        $obj = new TestFontAwesomeIconTrait();

        $obj->setFontAwesomeIcon($fontAwesomeIcon);
        $this->assertSame($fontAwesomeIcon, $obj->getFontAwesomeIcon());
    }
}
