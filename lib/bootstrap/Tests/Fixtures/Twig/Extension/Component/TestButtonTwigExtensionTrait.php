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

namespace WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Component;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ButtonTwigExtensionTrait;

/**
 * Test button Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Component
 */
class TestButtonTwigExtensionTrait {

    use ButtonTwigExtensionTrait {
        setButtonTwigExtension as public;
    }
}