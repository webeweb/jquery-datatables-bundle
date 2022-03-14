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

use WBW\Bundle\CoreBundle\Twig\Environment\TwigEnvironmentTrait;
use WBW\Bundle\JQuery\DataTablesBundle\Renderer\Assets\IconRendererTrait;

/**
 * Test icon renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Renderer\Assets
 */
class TestIconRendererTrait {

    use IconRendererTrait {
        renderIcon as public;
    }
    use TwigEnvironmentTrait {
        setTwigEnvironment as public;
    }
}
