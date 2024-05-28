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

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Component\TestBadgeTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\BadgeTwigExtension;

/**
 * Badge Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component
 */
class BadgeTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setBadgeTwigExtension()
     *
     * @return void
     */
    public function testSetBadgeTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Badge Twig extension mock.
        $badgeTwigExtension = new BadgeTwigExtension($twigEnvironment);

        $obj = new TestBadgeTwigExtensionTrait();

        $obj->setBadgeTwigExtension($badgeTwigExtension);
        $this->assertSame($badgeTwigExtension, $obj->getBadgeTwigExtension());
    }
}
