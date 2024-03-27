<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Assets;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\BadgeTwigExtensionTrait;
use WBW\Bundle\CoreBundle\Translation\TranslatorTrait;
use WBW\Bundle\DataTablesBundle\Renderer\Assets\EnabledBadgeRendererTrait;

/**
 * Test enabled badge renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer\Assets
 */
class TestEnabledBadgeRendererTrait {

    use BadgeTwigExtensionTrait {
        setBadgeTwigExtension as public;
    }
    use TranslatorTrait {
        setTranslator as public;
    }
    use EnabledBadgeRendererTrait {
        renderEnabledBadge as public;
    }
}
