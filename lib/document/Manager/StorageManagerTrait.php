<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DocumentBundle\Manager;

/**
 * Storage manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DocumentBundle\Manager
 */
trait StorageManagerTrait {

    /**
     * Storage manager.
     *
     * @var StorageManagerInterface|null
     */
    private $storageManager;

    /**
     * Get the storage manager.
     *
     * @return StorageManagerInterface|null Returns the storage manager.
     */
    public function getStorageManager(): ?StorageManagerInterface {
        return $this->storageManager;
    }

    /**
     * Set the storage manager.
     *
     * @param StorageManagerInterface|null $storageManager The storage manager.
     * @return self Returns this instance.
     */
    public function setStorageManager(?StorageManagerInterface $storageManager): self {
        $this->storageManager = $storageManager;
        return $this;
    }
}
