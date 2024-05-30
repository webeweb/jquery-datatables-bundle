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

namespace WBW\Bundle\DataTablesBundle\Manager;

/**
 * DataTables manager trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Manager
 */
trait DataTablesManagerTrait {

    /**
     * DataTables manager.
     *
     * @var DataTablesManagerInterface|null
     */
    private $dataTablesManager;

    /**
     * Get the DataTables manager.
     *
     * @return DataTablesManagerInterface|null Returns the DataTables manager.
     */
    public function getDataTablesManager(): ?DataTablesManagerInterface {
        return $this->dataTablesManager;
    }

    /**
     * Set the DataTables manager.
     *
     * @param DataTablesManagerInterface|null $dataTablesManager The DataTables manager.
     * @return self Returns this instance.
     */
    protected function setDataTablesManager(?DataTablesManagerInterface $dataTablesManager): self {
        $this->dataTablesManager = $dataTablesManager;
        return $this;
    }
}
