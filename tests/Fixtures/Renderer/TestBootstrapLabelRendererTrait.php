<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\LabelTwigExtensionTrait;
use WBW\Bundle\CommonBundle\Translation\TranslatorTrait;
use WBW\Bundle\DataTablesBundle\Renderer\BootstrapLabelRendererTrait;

/**
 * Test Bootstrap label tenderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer
 */
class TestBootstrapLabelRendererTrait {

    use BootstrapLabelRendererTrait {
        renderLabelEnabled as public;
    }

    use LabelTwigExtensionTrait {
        setLabelTwigExtension as public;
    }

    use TranslatorTrait {
        setTranslator as public;
    }
}
