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

namespace WBW\Bundle\BootstrapBundle\Tests\Twig\Extension;

use Twig\Environment;
use WBW\Bundle\BootstrapBundle\Tests\AbstractTestCase;
use WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\TestAssetsTwigExtensionTrait;
use WBW\Bundle\BootstrapBundle\Twig\Extension\AssetsTwigExtension;

/**
 * Assets Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Twig\Extension
 */
class AssetsTwigExtensionTraitTest extends AbstractTestCase {

    /**
     * Test setAssetsTwigExtension()
     *
     * @return void
     */
    public function testSetAssetsTwigExtension(): void {

        // Set a Twig environment mock.
        $twigEnvironment = $this->getMockBuilder(Environment::class)->disableOriginalConstructor()->getMock();

        // Set a Assets Twig extension mock.
        $assetsTwigExtension = new AssetsTwigExtension($twigEnvironment);

        $obj = new TestAssetsTwigExtensionTrait();

        $obj->setAssetsTwigExtension($assetsTwigExtension);
        $this->assertSame($assetsTwigExtension, $obj->getAssetsTwigExtension());
    }
}
