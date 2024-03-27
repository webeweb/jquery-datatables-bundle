<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Provider;

use WBW\Library\Symfony\Provider\ProviderInterface;

/**
 * DataTables CSV exporter interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider
 */
interface DataTablesCSVExporterInterface extends ProviderInterface {

    /**
     * Export a columns.
     *
     * @return string[] Returns an array representing the columns.
     */
    public function exportColumns(): array;

    /**
     * Export a row.
     *
     * @param object $entity The entity.
     * @return mixed[] Returns an array representing this row.
     */
    public function exportRow($entity): array;
}
