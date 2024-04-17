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

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Layout;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Layout\TestGridTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\Layout\GridTwigExtension;

/**
 * Grid Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension\Layout
 */
class GridTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setGridTwigExtension()
     *
     * @return void
     */
    public function testSetGridTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Grid Twig extension mock.
        $gridTwigExtension = new GridTwigExtension($twigEnvironment);

        $obj = new TestGridTwigExtensionTrait();

        $obj->setGridTwigExtension($gridTwigExtension);
        $this->assertSame($gridTwigExtension, $obj->getGridTwigExtension());
    }
}
