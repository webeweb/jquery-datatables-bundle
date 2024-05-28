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
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Extend\TestMeteoconsTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MeteoconsTwigExtension;

/**
 * Meteocons Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Extend
 */
class MeteoconsTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setMeteoconsTwigExtension()
     *
     * @return void
     */
    public function testSetMeteoconsTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Meteocons Twig extension mock.
        $meteoconsTwigExtension = new MeteoconsTwigExtension($twigEnvironment);

        $obj = new TestMeteoconsTwigExtensionTrait();

        $obj->setMeteoconsTwigExtension($meteoconsTwigExtension);
        $this->assertSame($meteoconsTwigExtension, $obj->getMeteoconsTwigExtension());
    }
}
