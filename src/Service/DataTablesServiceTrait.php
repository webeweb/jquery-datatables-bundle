<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Service;

/**
 * DataTables service trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Service
 */
trait DataTablesServiceTrait {

    /**
     * DataTables service.
     *
     * @var DataTablesServiceInterface|null
     */
    private $dataTablesService;

    /**
     * Get the DataTables service.
     *
     * @return DataTablesServiceInterface|null Returns the DataTables service.
     */
    public function getDataTablesService(): ?DataTablesServiceInterface {
        return $this->dataTablesService;
    }

    /**
     * Set the DataTables service.
     *
     * @param DataTablesServiceInterface|null $dataTablesService The DataTables service.
     * @return self Returns this instance.
     */
    protected function setDataTablesService(?DataTablesServiceInterface $dataTablesService): self {
        $this->dataTablesService = $dataTablesService;
        return $this;
    }
}
