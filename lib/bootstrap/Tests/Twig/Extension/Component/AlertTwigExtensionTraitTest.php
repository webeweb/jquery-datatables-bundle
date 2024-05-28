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
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Component\TestAlertTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\AlertTwigExtension;

/**
 * Alert Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component
 */
class AlertTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setAlertTwigExtension()
     *
     * @return void
     */
    public function testSetAlertTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set an Alert Twig extension mock.
        $alertTwigExtension = new AlertTwigExtension($twigEnvironment);

        $obj = new TestAlertTwigExtensionTrait();

        $obj->setAlertTwigExtension($alertTwigExtension);
        $this->assertSame($alertTwigExtension, $obj->getAlertTwigExtension());
    }
}
