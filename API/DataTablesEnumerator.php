<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\API;

/**
 * DataTables enumerator.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesEnumerator {

    /**
     * Enumerates cell types.
     *
     * @return string[] Returns the cell types enumeration.
     */
    public static function enumCellTypes(): array {
        return [
            DataTablesColumnInterface::DATATABLES_CELL_TYPE_TD,
            DataTablesColumnInterface::DATATABLES_CELL_TYPE_TH,
        ];
    }

    /**
     * Enumerates dirs.
     *
     * @return string[] Returns the dirs enumeration.
     */
    public static function enumDirs(): array {
        return [
            DataTablesOrderInterface::DATATABLES_DIR_ASC,
            DataTablesOrderInterface::DATATABLES_DIR_DESC,
        ];
    }

    /**
     * Enumerates order sequences.
     *
     * @return string[] Returns the order sequences enumeration.
     */
    public static function enumOrderSequences(): array {
        return [
            DataTablesColumnInterface::DATATABLES_ORDER_SEQUENCE_ASC,
            DataTablesColumnInterface::DATATABLES_ORDER_SEQUENCE_DESC,
        ];
    }

    /**
     * Enumerates parameters.
     *
     * @return string[] Returns the parameters enumeration.
     */
    public static function enumParameters(): array {
        return [
            DataTablesRequestInterface::DATATABLES_PARAMETER_COLUMNS,
            DataTablesRequestInterface::DATATABLES_PARAMETER_DRAW,
            DataTablesRequestInterface::DATATABLES_PARAMETER_LENGTH,
            DataTablesRequestInterface::DATATABLES_PARAMETER_ORDER,
            DataTablesRequestInterface::DATATABLES_PARAMETER_SEARCH,
            DataTablesRequestInterface::DATATABLES_PARAMETER_START,
        ];
    }

    /**
     * Enumerates rows.
     *
     * @return string[] Returns the rows enumeration.
     */
    public static function enumRows(): array {
        return [
            DataTablesResponseInterface::DATATABLES_ROW_ATTR,
            DataTablesResponseInterface::DATATABLES_ROW_CLASS,
            DataTablesResponseInterface::DATATABLES_ROW_DATA,
            DataTablesResponseInterface::DATATABLES_ROW_ID,
        ];
    }

    /**
     * Enumerates types.
     *
     * @return string[] Returns the types enumeration.
     */
    public static function enumTypes(): array {
        return [
            DataTablesColumnInterface::DATATABLES_TYPE_DATE,
            DataTablesColumnInterface::DATATABLES_TYPE_HTML,
            DataTablesColumnInterface::DATATABLES_TYPE_HTML_NUM,
            DataTablesColumnInterface::DATATABLES_TYPE_NUM,
            DataTablesColumnInterface::DATATABLES_TYPE_NUM_FMT,
            DataTablesColumnInterface::DATATABLES_TYPE_STRING,
        ];
    }
}
