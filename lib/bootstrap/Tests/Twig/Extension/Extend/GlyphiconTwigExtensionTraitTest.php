<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Extend\TestGlyphiconTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\GlyphiconTwigExtension;

/**
 * Glyphicon Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class GlyphiconTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setGlyphiconTwigExtension()
     *
     * @return void
     */
    public function testSetGlyphiconTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Glyphicon Twig extension mock.
        $glyphiconTwigExtension = new GlyphiconTwigExtension($twigEnvironment);

        $obj = new TestGlyphiconTwigExtensionTrait();

        $obj->setGlyphiconTwigExtension($glyphiconTwigExtension);
        $this->assertSame($glyphiconTwigExtension, $obj->getGlyphiconTwigExtension());
    }
}
