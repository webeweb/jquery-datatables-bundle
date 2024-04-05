<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Content;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Content\TestTypographyTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Content\TypographyTwigExtension;

/**
 * Typography Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Content
 */
class TypographyTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setTypographyTwigExtension()
     *
     * @return void
     */
    public function testSetTypographyTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Typography Twig extension mock.
        $typographyTwigExtension = new TypographyTwigExtension($twigEnvironment);

        $obj = new TestTypographyTwigExtensionTrait();

        $obj->setTypographyTwigExtension($typographyTwigExtension);
        $this->assertSame($typographyTwigExtension, $obj->getTypographyTwigExtension());
    }
}
