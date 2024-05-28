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

namespace WBW\Bundle\DataTablesBundle\Provider;

use WBW\Bundle\CommonBundle\Provider\ProviderInterface;

/**
 * DataTables exporter interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider
 */
interface DataTablesExporterInterface extends ProviderInterface {

    /**
     * Export the columns.
     *
     * @return string[] Returns the columns.
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
