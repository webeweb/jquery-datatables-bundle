<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Extend\TestTablerIconTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\TablerIconTwigExtension;

/**
 * Tabler icon Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class TablerIconTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setTablerIconTwigExtension()
     *
     * @return void
     */
    public function testSetTablerIconTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Tabler icon Twig extension mock.
        $tablerIconTwigExtension = new TablerIconTwigExtension($twigEnvironment);

        $obj = new TestTablerIconTwigExtensionTrait();

        $obj->setTablerIconTwigExtension($tablerIconTwigExtension);
        $this->assertSame($tablerIconTwigExtension, $obj->getTablerIconTwigExtension());
    }
}
