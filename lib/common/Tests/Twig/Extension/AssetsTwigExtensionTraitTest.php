<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Twig\Extension;

use Twig\Environment;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Twig\Extension\TestAssetsTwigExtensionTrait;
use WBW\Bundle\CommonBundle\Twig\Extension\AssetsTwigExtension;

/**
 * Assets Twig extension trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Twig\Extension
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

        // Set an Assets Twig extension mock.
        $assetsTwigExtension = new AssetsTwigExtension($twigEnvironment);

        $obj = new TestAssetsTwigExtensionTrait();

        $obj->setAssetsTwigExtension($assetsTwigExtension);
        $this->assertSame($assetsTwigExtension, $obj->getAssetsTwigExtension());
    }
}
