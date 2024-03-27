<?php

declare(strict_types = 1);

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
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Twig\Extension
 */
trait DataTablesTwigExtensionTrait {

    /**
     * DataTables Twig extension.
     *
     * @var DataTablesTwigExtension|null
     */
    private $dataTablesTwigExtension;

    /**
     * Get the DataTables Twig extension.
     *
     * @return DataTablesTwigExtension|null Returns the DataTables Twig extension.
     */
    public function getDataTablesTwigExtension(): ?DataTablesTwigExtension {
        return $this->dataTablesTwigExtension;
    }

    /**
     * Set the DataTables Twig extension.
     *
     * @param DataTablesTwigExtension|null $dataTablesTwigExtension The DataTables Twig extension.
     * @return self Returns this instance.
     */
    protected function setDataTablesTwigExtension(?DataTablesTwigExtension $dataTablesTwigExtension): self {
        $this->dataTablesTwigExtension = $dataTablesTwigExtension;
        return $this;
    }
}
