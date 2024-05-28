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

namespace WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Content;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Content\TypographyTwigExtensionTrait;

/**
 * Test typography Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Content
 */
class TestTypographyTwigExtensionTrait {

    use TypographyTwigExtensionTrait {
        setTypographyTwigExtension as public;
    }
}
