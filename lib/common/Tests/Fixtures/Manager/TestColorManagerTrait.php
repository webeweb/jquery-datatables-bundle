<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Manager;

use WBW\Bundle\CommonBundle\Manager\ColorManagerTrait;

/**
 * Test color manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Manager
 */
class TestColorManagerTrait {

    use ColorManagerTrait {
        setColorManager as public;
    }
}
