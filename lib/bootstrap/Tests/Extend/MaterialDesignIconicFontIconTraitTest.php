<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Extend;

use WBW\Bundle\BootstrapBundle\Extend\MaterialDesignIconicFontIconInterface;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Extend\TestMaterialDesignIconicFontIconTrait;

/**
 * Font Awesome icon trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Extend
 */
class MaterialDesignIconicFontIconTraitTest extends AbstractTestCase {

    /**
     * Test setMaterialDesignIconicFontIcon()
     *
     * @return void
     */
    public function testSetMaterialDesignIconicFontIcon(): void {

        // Set a Material Design Iconic font icon mock.
        $materialDesignIconicFontIcon = $this->getMockBuilder(MaterialDesignIconicFontIconInterface::class)->getMock();

        $obj = new TestMaterialDesignIconicFontIconTrait();

        $obj->setMaterialDesignIconicFontIcon($materialDesignIconicFontIcon);
        $this->assertSame($materialDesignIconicFontIcon, $obj->getMaterialDesignIconicFontIcon());
    }
}
