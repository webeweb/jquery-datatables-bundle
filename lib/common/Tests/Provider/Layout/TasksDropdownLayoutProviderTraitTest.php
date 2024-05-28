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

namespace WBW\Bundle\CommonBundle\Tests\Provider\Layout;

use WBW\Bundle\CommonBundle\Provider\Layout\TasksDropdownLayoutProviderInterface;
use WBW\Bundle\CommonBundle\Tests\AbstractTestCase;
use WBW\Bundle\CommonBundle\Tests\Fixtures\Provider\Layout\TestTasksDropdownLayoutProviderTrait;

/**
 * Tasks dropdown layout provider trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Tests\Provider\Layout
 */
class TasksDropdownLayoutProviderTraitTest extends AbstractTestCase {

    /**
     * Test setTasksDropdownLayoutProvider()
     *
     * @return void
     */
    public function testSetTasksDropdownLayoutProvider(): void {

        // Set a Tasks dropdown layout provider mock.
        $tasksDropdownLayoutProvider = $this->getMockBuilder(TasksDropdownLayoutProviderInterface::class)->getMock();

        $obj = new TestTasksDropdownLayoutProviderTrait();

        $obj->setTasksDropdownLayoutProvider($tasksDropdownLayoutProvider);
        $this->assertSame($tasksDropdownLayoutProvider, $obj->getTasksDropdownLayoutProvider());
    }
}
