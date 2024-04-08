<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2024 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Provider;

/**
 * DataTables exporter trait.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider
 */
trait DataTablesExporterTrait {

    /**
     * Exporter.
     *
     * @var DataTablesExporterInterface|null
     */
    protected $exporter;

    /**
     * Get the exporter.
     *
     * @return DataTablesExporterInterface|null Returns the exporter.
     */
    public function getExporter(): ?DataTablesExporterInterface {
        return $this->exporter;
    }

    /**
     * Set the exporter.
     *
     * @param DataTablesExporterInterface|null $exporter The exporter.
     * @return self Returns this instance.
     */
    protected function setExporter(?DataTablesExporterInterface $exporter): self {
        $this->exporter = $exporter;
        return $this;
    }
}
