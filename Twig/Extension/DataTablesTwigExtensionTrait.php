<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension;

/**
 * DataTables Twig extension trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension
 */
trait DataTablesTwigExtensionTrait {

    /**
     * DataTables Twig extension.
     *
     * @var DataTablesTwigExtension
     */
    private $dataTablesTwigExtension;

    /**
     * Get the DataTables Twig extension.
     *
     * @return DataTablesTwigExtension Returns the DataTables Twig extension.
     */
    public function getDataTablesTwigExtension() {
        return $this->dataTablesTwigExtension;
    }

    /**
     * Set the DataTables Twig extension.
     *
     * @param DataTablesTwigExtension $dataTablesTwigExtension The DataTables Twig extension.
     */
    protected function setDataTablesTwigExtension(DataTablesTwigExtension $dataTablesTwigExtension = null) {
        $this->dataTablesTwigExtension = $dataTablesTwigExtension;
        return $this;
    }
}
