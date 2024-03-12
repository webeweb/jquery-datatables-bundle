<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Provider;

use WBW\Library\Symfony\Provider\ProviderInterface;

/**
 * DataTables CSV exporter interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Provider
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
