<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer;

use WBW\Bundle\CommonBundle\Twig\Environment\TwigEnvironmentTrait;
use WBW\Bundle\DataTablesBundle\Renderer\BootstrapIconRendererTrait;

/**
 * Test Bootstrap icon renderer trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Renderer
 */
class TestBootstrapIconRendererTrait {

    use BootstrapIconRendererTrait {
        renderIcon as public;
    }
    use TwigEnvironmentTrait {
        setTwigEnvironment as public;
    }
}