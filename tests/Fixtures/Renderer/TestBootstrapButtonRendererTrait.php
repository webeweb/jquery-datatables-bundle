<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Component\ButtonTwigExtensionTrait;
use WBW\Bundle\CommonBundle\Routing\RouterTrait;
use WBW\Bundle\CommonBundle\Translation\TranslatorTrait;
use WBW\Bundle\DataTablesBundle\Renderer\BootstrapButtonRendererTrait;

/**
 * Test Bootstrap button tenderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer
 */
class TestBootstrapButtonRendererTrait {

    use BootstrapButtonRendererTrait {
        renderActionButtonComment as public;
        renderActionButtonDelete as public;
        renderActionButtonDuplicate as public;
        renderActionButtonEdit as public;
        renderActionButtonNew as public;
        renderActionButtonPdf as public;
        renderActionButtonShow as public;
        renderActionButtonSwitch as public;
    }

    use ButtonTwigExtensionTrait {
        setButtonTwigExtension as public;
    }

    use RouterTrait {
        setRouter as public;
    }

    use TranslatorTrait {
        setTranslator as public;
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string {
        return "test";
    }
}
