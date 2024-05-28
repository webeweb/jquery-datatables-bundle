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
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Extend\TestFontAwesomeTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\FontAwesomeTwigExtension;

/**
 * Font Awesome Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class FontAwesomeTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setFontAwesomeTwigExtension()
     *
     * @return void
     */
    public function testSetFontAwesomeTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Font Awesome Twig extension mock.
        $fontAwesomeTwigExtension = new FontAwesomeTwigExtension($twigEnvironment);

        $obj = new TestFontAwesomeTwigExtensionTrait();

        $obj->setFontAwesomeTwigExtension($fontAwesomeTwigExtension);
        $this->assertSame($fontAwesomeTwigExtension, $obj->getFontAwesomeTwigExtension());
    }
}
