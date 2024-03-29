<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Normalizer;

use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponseInterface;
use WBW\Library\Types\Helper\ArrayHelper;

/**
 * DataTables normalizer.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Normalizer
 */
class DataTablesNormalizer {

    /**
     * Normalize a column.
     *
     * @param DataTablesColumnInterface $column The column.
     * @return array<string,mixed> Returns teh normalized column.
     */
    public static function normalizeColumn(DataTablesColumnInterface $column): array {

        $output = [];

        ArrayHelper::set($output, "cellType", $column->getCellType(), [null]);
        ArrayHelper::set($output, "classname", $column->getClassname(), [null]);
        ArrayHelper::set($output, "contentPadding", $column->getContentPadding(), [null]);
        ArrayHelper::set($output, "data", $column->getData(), [null]);
        ArrayHelper::set($output, "defaultContent", $column->getDefaultContent(), [null]);
        ArrayHelper::set($output, "name", $column->getName(), [null]);
        ArrayHelper::set($output, "orderable", $column->getOrderable(), [null, true]);
        ArrayHelper::set($output, "orderData", $column->getOrderData(), [null]);
        ArrayHelper::set($output, "orderDataType", $column->getOrderDataType(), [null]);
        ArrayHelper::set($output, "orderSequence", $column->getOrderSequence(), [null]);
        ArrayHelper::set($output, "searchable", $column->getSearchable(), [null, true]);
        ArrayHelper::set($output, "type", $column->getType(), [null]);
        ArrayHelper::set($output, "visible", $column->getVisible(), [null, true]);
        ArrayHelper::set($output, "width", $column->getWidth(), [null]);

        return $output;
    }

    /**
     * Normalize a response.
     *
     * @param DataTablesResponseInterface $response The response.
     * @return array<string,mixed> Returns the normalized response.
     */
    public static function normalizeResponse(DataTablesResponseInterface $response): array {

        return [
            "data"            => $response->getData(),
            "draw"            => $response->getDraw(),
            "recordsFiltered" => $response->getRecordsFiltered(),
            "recordsTotal"    => $response->getRecordsTotal(),
        ];
    }
}
