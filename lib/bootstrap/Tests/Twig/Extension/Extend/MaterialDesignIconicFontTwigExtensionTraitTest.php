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

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Extend\TestMaterialDesignIconicFontTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MaterialDesignIconicFontTwigExtension;

/**
 * Material Design Iconic font Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class MaterialDesignIconicFontTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setMaterialDesignIconicFontTwigExtension()
     *
     * @return void
     */
    public function testSetMaterialDesignIconicFontTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Material Design Iconic font Twig extension mock.
        $materialDesignIconicFontTwigExtension = new MaterialDesignIconicFontTwigExtension($twigEnvironment);

        $obj = new TestMaterialDesignIconicFontTwigExtensionTrait();

        $obj->setMaterialDesignIconicFontTwigExtension($materialDesignIconicFontTwigExtension);
        $this->assertSame($materialDesignIconicFontTwigExtension, $obj->getMaterialDesignIconicFontTwigExtension());
    }
}
