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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Twig\Extension;

use WBW\Bundle\CommonBundle\Twig\Extension\AssetsTwigExtensionTrait;

/**
 * Test assets Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Twig\Extension
 */
class TestAssetsTwigExtensionTrait {

    use AssetsTwigExtensionTrait {
        setAssetsTwigExtension as public;
    }
}
