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

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Component\TestLabelTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\LabelTwigExtension;

/**
 * Label Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Component
 */
class LabelTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setLabelTwigExtension()
     *
     * @return void
     */
    public function testSetLabelTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Label Twig extension mock.
        $labelTwigExtension = new LabelTwigExtension($twigEnvironment);

        $obj = new TestLabelTwigExtensionTrait();

        $obj->setLabelTwigExtension($labelTwigExtension);
        $this->assertSame($labelTwigExtension, $obj->getLabelTwigExtension());
    }
}
