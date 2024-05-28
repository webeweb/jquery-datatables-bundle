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

namespace WBW\Bundle\CommonBundle\Manager;

/**
 * Manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\CommonBundle\Manager
 */
trait ManagerTrait {

    /**
     * Manager.
     *
     * @var ManagerInterface|null
     */
    protected $manager;

    /**
     * Get the manager.
     *
     * @return ManagerInterface|null Returns the manager.
     */
    public function getManager(): ?ManagerInterface {
        return $this->manager;
    }

    /**
     * Set the manager.
     *
     * @param ManagerInterface|null $manager The manager.
     * @return self Returns this instance.
     */
    protected function setManager(?ManagerInterface $manager): self {
        $this->manager = $manager;
        return $this;
    }
}
