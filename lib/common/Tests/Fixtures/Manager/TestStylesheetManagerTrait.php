<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2022 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Manager;

use WBW\Bundle\CommonBundle\Manager\StylesheetManagerTrait;

/**
 * Test stylesheet manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Manager
 */
class TestStylesheetManagerTrait {

    use StylesheetManagerTrait {
        setStylesheetManager as public;
    }
}
