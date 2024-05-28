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

namespace WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Extend;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\GlyphiconTwigExtensionTrait;

/**
 * Test glyphicon Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Extend
 */
class TestGlyphiconTwigExtensionTrait {

    use GlyphiconTwigExtensionTrait {
        setGlyphiconTwigExtension as public;
    }
}
