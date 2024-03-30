<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Extend;

use WBW\Bundle\BootstrapBundle\Twig\Extension\Extend\MeteoconsTwigExtensionTrait;

/**
 * Test Meteocons Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\BootstrapBundle\Tests\Fixtures\Twig\Extension\Extend
 */
class TestMeteoconsTwigExtensionTrait {

    use MeteoconsTwigExtensionTrait {
        setMeteoconsTwigExtension as public;
    }
}
