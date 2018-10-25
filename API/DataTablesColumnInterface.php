<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\API;

use JsonSerializable;

/**
 * DataTables column interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
interface DataTablesColumnInterface extends JsonSerializable {

    /**
     * Cell type "td".
     *
     * @var string
     */
    const DATATABLES_CELL_TYPE_TD = "td";

    /**
     * Cell type "th".
     *
     * @var string
     */
    const DATATABLES_CELL_TYPE_TH = "th";

    /**
     * Order sequence "asc".
     *
     * @var string
     */
    const DATATABLES_ORDER_SEQUENCE_ASC = "asc";

    /**
     * Order sequence "desc".
     *
     * @var string
     */
    const DATATABLES_ORDER_SEQUENCE_DESC = "desc";

    /**
     * Parameter "data".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_DATA = "data";

    /**
     * Parameter "name".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_NAME = "name";

    /**
     * Parameter "search".
     *
     * @var string
     */
    const DATATABLES_PARAMETER_SEARCH = "search";

    /**
     * Type "date".
     *
     * @var string
     */
    const DATATABLES_TYPE_DATE = "date";

    /**
     * Type "html".
     *
     * @var string
     */
    const DATATABLES_TYPE_HTML = "html";

    /**
     * Type "html-num".
     *
     * @var string
     */
    const DATATABLES_TYPE_HTML_NUM = "html-num";

    /**
     * Type "num".
     *
     * @var string
     */
    const DATATABLES_TYPE_NUM = "num";

    /**
     * Type "num-fmt".
     *
     * @var string
     */
    const DATATABLES_TYPE_NUM_FMT = "num-fmt";

    /**
     * Type "string".
     *
     * @var string
     */
    const DATATABLES_TYPE_STRING = "string";

    /**
     * Get the cell type.
     *
     * @return string Returns the cell type.
     */
    public function getCellType();

    /**
     * Get the class name.
     *
     * @return string Returns the class name.
     */
    public function getClassname();

    /**
     * Get the content padding.
     *
     * @return string Returns the content padding.
     */
    public function getContentPadding();

    /**
     * Get the data.
     *
     * @return integer|string Returns the data.
     */
    public function getData();

    /**
     * Get the default content
     *
     * @return string Returns the default content.
     */
    public function getDefaultContent();

    /**
     * Get the mapping.
     *
     * @return DataTablesMappingInterface The mapping.
     */
    public function getMapping();

    /**
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName();

    /**
     * Get the order data.
     *
     * @return integer|array Returns the order data.
     */
    public function getOrderData();

    /**
     * Get the order data type.
     *
     * @return string Returns the order data type.
     */
    public function getOrderDataType();

    /**
     * Get the order sequence.
     *
     * @return string Returns the order sequence.
     */
    public function getOrderSequence();

    /**
     * Get the orderable.
     *
     * @return bool Returns the orderable.
     */
    public function getOrderable();

    /**
     * Get the search.
     *
     * @return DataTablesSearchInterface Returns the search.
     */
    public function getSearch();

    /**
     * Get the searchable.
     *
     * @return bool Returns the searchable.
     */
    public function getSearchable();

    /**
     * Get the title.
     *
     * @return string Returns the title.
     */
    public function getTitle();

    /**
     * Get the type.
     *
     * @return string Returns the type.
     */
    public function getType();

    /**
     * Get the visible.
     *
     * @return bool Returns the visible.
     */
    public function getVisible();

    /**
     * Get the width.
     *
     * @return string Returns the width.
     */
    public function getWidth();
}
