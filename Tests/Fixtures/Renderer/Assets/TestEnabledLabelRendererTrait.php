<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Assets;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\LabelTwigExtensionTrait;
use WBW\Bundle\CoreBundle\Translation\TranslatorTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Renderer\Assets\EnabledLabelRendererTrait;

/**
 * Test enabled badge renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Assets
 */
class TestEnabledLabelRendererTrait {

    use LabelTwigExtensionTrait {
        setLabelTwigExtension as public;
    }
    use TranslatorTrait {
        setTranslator as public;
    }
    use EnabledLabelRendererTrait {
        renderEnabledLabel as public;
    }
}
