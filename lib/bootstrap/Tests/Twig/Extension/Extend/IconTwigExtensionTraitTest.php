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
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Extend\TestIconTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\IconTwigExtension;

/**
 * Icon Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class IconTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setIconTwigExtension()
     *
     * @return void
     */
    public function testSetIconTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set an Icon Twig extension mock.
        $iconTwigExtension = new IconTwigExtension($twigEnvironment);

        $obj = new TestIconTwigExtensionTrait();

        $obj->setIconTwigExtension($iconTwigExtension);
        $this->assertSame($iconTwigExtension, $obj->getIconTwigExtension());
    }
}
