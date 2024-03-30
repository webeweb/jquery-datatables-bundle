<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Component\TestProgressBarTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ProgressBarTwigExtension;

/**
 * Progress bar Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component
 */
class ProgressBarTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setProgressBarTwigExtension()
     *
     * @return void
     */
    public function testSetProgressBarTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Progress bar Twig extension mock.
        $progressBarTwigExtension = new ProgressBarTwigExtension($twigEnvironment);

        $obj = new TestProgressBarTwigExtensionTrait();

        $obj->setProgressBarTwigExtension($progressBarTwigExtension);
        $this->assertSame($progressBarTwigExtension, $obj->getProgressBarTwigExtension());
    }
}
