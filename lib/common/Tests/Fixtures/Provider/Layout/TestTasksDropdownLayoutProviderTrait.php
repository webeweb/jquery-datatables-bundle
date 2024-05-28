<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\Layout\TasksDropdownLayoutProviderTrait;

/**
 * Test tasks dropdown layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout
 */
class TestTasksDropdownLayoutProviderTrait {

    use TasksDropdownLayoutProviderTrait {
        setTasksDropdownLayoutProvider as public;
    }
}
