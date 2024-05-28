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

namespace WBW\Bundle\CommonBundle\Provider\Layout;

/**
 * Tasks dropdown layout provider trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Provider\Layout
 */
trait TasksDropdownLayoutProviderTrait {

    /**
     * Tasks dropdown layout provider.
     *
     * @var TasksDropdownLayoutProviderInterface|null
     */
    private $tasksDropdownLayoutProvider;

    /**
     * Get the tasks dropdown layout provider.
     *
     * @return TasksDropdownLayoutProviderInterface|null Returns the tasks dropdown layout provider.
     */
    public function getTasksDropdownLayoutProvider(): ?TasksDropdownLayoutProviderInterface {
        return $this->tasksDropdownLayoutProvider;
    }

    /**
     * Set the tasks dropdown layout provider.
     *
     * @param TasksDropdownLayoutProviderInterface|null $tasksDropdownLayoutProvider The tasks dropdown layout provider.
     * @return self Returns this instance.
     */
    protected function setTasksDropdownLayoutProvider(?TasksDropdownLayoutProviderInterface $tasksDropdownLayoutProvider): self {
        $this->tasksDropdownLayoutProvider = $tasksDropdownLayoutProvider;
        return $this;
    }
}
