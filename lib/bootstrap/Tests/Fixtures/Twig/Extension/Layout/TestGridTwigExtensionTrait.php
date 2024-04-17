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

namespace WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Layout;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Layout\GridTwigExtensionTrait;

/**
 * Test grid Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Layout
 */
class TestGridTwigExtensionTrait {

    use GridTwigExtensionTrait {
        setGridTwigExtension as public;
    }
}
