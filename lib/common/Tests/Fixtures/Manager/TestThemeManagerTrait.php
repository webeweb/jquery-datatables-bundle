<?php

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Manager;

use WBW\Bundle\CommonBundle\Manager\ThemeManagerTrait;

/**
 * Test theme manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Manager
 */
class TestThemeManagerTrait {

    use ThemeManagerTrait {
        setThemeManager as public;
    }
}
