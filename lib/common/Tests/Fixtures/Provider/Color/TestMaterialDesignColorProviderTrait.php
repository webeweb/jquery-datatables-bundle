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

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Color;

use WBW\Bundle\CommonBundle\Provider\Color\MaterialDesignColorProviderTrait;

/**
 * Test Material Design color provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Color
 */
class TestMaterialDesignColorProviderTrait {

    use MaterialDesignColorProviderTrait {
        setMaterialDesignColorProvider as public;
    }
}
