<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Content;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Content\TestCodeTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Content\CodeTwigExtension;

/**
 * Code Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Content
 */
class CodeTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setCodeTwigExtension()
     *
     * @return void
     */
    public function testSetCodeTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Code Twig extension mock.
        $codeTwigExtension = new CodeTwigExtension($twigEnvironment);

        $obj = new TestCodeTwigExtensionTrait();

        $obj->setCodeTwigExtension($codeTwigExtension);
        $this->assertSame($codeTwigExtension, $obj->getCodeTwigExtension());
    }
}
