<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Manager;

/**
 * DataTables manager trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Manager
 */
trait DataTablesManagerTrait {

    /**
     * DataTables manager.
     *
     * @var DataTablesManager|null
     */
    private $dataTablesManager;

    /**
     * Get the DataTables manager.
     *
     * @return DataTablesManager|null Returns the DataTables manager.
     */
    public function getDataTablesManager(): ?DataTablesManager {
        return $this->dataTablesManager;
    }

    /**
     * Set the DataTables manager.
     *
     * @param DataTablesManager|null $dataTablesManager The DataTables manager.
     * @return self Returns this instance.
     */
    protected function setDataTablesManager(?DataTablesManager $dataTablesManager): self {
        $this->dataTablesManager = $dataTablesManager;
        return $this;
    }
}
