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
use WBW\Library\Core\Argument\ArrayHelper;

/**
 * DataTables column.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesColumn implements DataTablesColumnInterface, JsonSerializable {

    /**
     * Cell type.
     *
     * @var string
     */
    private $cellType;

    /**
     * Class name.
     *
     * @var string
     */
    private $classname;

    /**
     * Content padding.
     *
     * @var string
     */
    private $contentPadding;

    /**
     * Data.
     *
     * @var integer|string
     */
    private $data;

    /**
     * Default content.
     *
     * @var string
     */
    private $defaultContent;

    /**
     * mapping.
     *
     * @var DataTablesMappingInterface
     */
    private $mapping;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Order data.
     *
     * @var integer|array
     */
    private $orderData;

    /**
     * Order data type.
     *
     * @var string
     */
    private $orderDataType;

    /**
     * Order sequence.
     *
     * @var string
     */
    private $orderSequence;

    /**
     * Orderable.
     *
     * @var bool
     */
    private $orderable;

    /**
     * Search.
     *
     * @var DataTablesSearchInterface
     */
    private $search;

    /**
     * Searchable.
     *
     * @var bool
     */
    private $searchable;

    /**
     * Title.
     *
     * @var string
     */
    private $title;

    /**
     * Type.
     *
     * @var string
     */
    private $type;

    /**
     * Visible.
     *
     * @var bool
     */
    private $visible;

    /**
     * Width.
     *
     * @var string
     */
    private $width;

    /**
     * Constructor.
     */
    protected function __construct() {
        $this->setCellType(self::DATATABLES_CELL_TYPE_TD);
        $this->setMapping(new DataTablesMapping());
        $this->setOrderable(true);
        $this->setSearchable(true);
        $this->setVisible(true);
    }

    /**
     * DataTables cell types.
     *
     * @return array Returns the cell types.
     */
    public static function dtCellTypes() {
        return [
            self::DATATABLES_CELL_TYPE_TD,
            self::DATATABLES_CELL_TYPE_TH,
        ];
    }

    /**
     * DataTables order sequences.
     *
     * @return array Returns the order sequences.
     */
    public static function dtOrderSequences() {
        return [
            self::DATATABLES_ORDER_SEQUENCE_ASC,
            self::DATATABLES_ORDER_SEQUENCE_DESC,
        ];
    }

    /**
     * DataTables types.
     *
     * @return array Returns the types.
     */
    public static function dtTypes() {
        return [
            self::DATATABLES_TYPE_DATE,
            self::DATATABLES_TYPE_HTML,
            self::DATATABLES_TYPE_HTML_NUM,
            self::DATATABLES_TYPE_NUM,
            self::DATATABLES_TYPE_NUM_FMT,
            self::DATATABLES_TYPE_STRING,
        ];
    }

    /**
     * Get the cell type.
     *
     * @return string Returns the cell type.
     */
    public function getCellType() {
        return $this->cellType;
    }

    /**
     * Get the class name.
     *
     * @return string Returns the class name.
     */
    public function getClassname() {
        return $this->classname;
    }

    /**
     * Get the content padding.
     *
     * @return string Returns the content padding.
     */
    public function getContentPadding() {
        return $this->contentPadding;
    }

    /**
     * Get the data.
     *
     * @return integer|string Returns the data.
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Get the default content
     *
     * @return string Returns the default content.
     */
    public function getDefaultContent() {
        return $this->defaultContent;
    }

    /**
     * Get the mapping.
     *
     * @return DataTablesMappingInterface The mapping.
     */
    public function getMapping() {
        return $this->mapping;
    }

    /**
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get the order data.
     *
     * @return integer|array Returns the order data.
     */
    public function getOrderData() {
        return $this->orderData;
    }

    /**
     * Get the order data type.
     *
     * @return string Returns the order data type.
     */
    public function getOrderDataType() {
        return $this->orderDataType;
    }

    /**
     * Get the order sequence.
     *
     * @return string Returns the order sequence.
     */
    public function getOrderSequence() {
        return $this->orderSequence;
    }

    /**
     * Get the orderable.
     *
     * @return bool Returns the orderable.
     */
    public function getOrderable() {
        return $this->orderable;
    }

    /**
     * Get the search.
     *
     * @return DataTablesSearchInterface Returns the search.
     */
    public function getSearch() {
        return $this->search;
    }

    /**
     * Get the searchable.
     *
     * @return bool Returns the searchable.
     */
    public function getSearchable() {
        return $this->searchable;
    }

    /**
     * Get the title.
     *
     * @return string Returns the title.
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Get the type.
     *
     * @return string Returns the type.
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Get the visible.
     *
     * @return bool Returns the visible.
     */
    public function getVisible() {
        return $this->visible;
    }

    /**
     * Get the width.
     *
     * @return string Returns the width.
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize() {
        return $this->toArray();
    }

    /**
     * Create a column instance.
     *
     * @param string $data The column data.
     * @param string $name The column name.
     * @param string $cellType The column cell type.
     * @return DataTablesColumn Returns a column.
     */
    public static function newInstance($data, $name, $cellType = self::DATATABLES_CELL_TYPE_TD) {

        // Initialize a column.
        $dtColumn = new DataTablesColumn();
        $dtColumn->setCellType($cellType);
        $dtColumn->setData($data);
        $dtColumn->setName($name);
        $dtColumn->setTitle($name);
        $dtColumn->mapping->setColumn($data);

        // Return the column.
        return $dtColumn;
    }

    /**
     * Parse a raw columns array.
     *
     * @param array $rawColumns The raw columns array.
     * @param DataTablesWrapper $wrapper The wrapper.
     * @return DataTablesColumn[] Returns the columns.
     */
    public static function parse(array $rawColumns, DataTablesWrapper $wrapper) {

        // Initialize the columns.
        $dtColumns = [];

        // Handle each column.
        foreach ($rawColumns as $current) {

            // Get the column.
            $dtColumn = $wrapper->getColumn($current[self::DATATABLES_PARAMETER_DATA]);

            // Check the column.
            if (null === $dtColumn) {
                continue;
            }
            if ($current[self::DATATABLES_PARAMETER_NAME] !== $dtColumn->getName()) {
                continue;
            }
            if (false === $dtColumn->getSearchable()) {
                $dtColumn->setSearch(DataTablesSearch::parse([])); // Set a default search.
                continue;
            }

            // Set the search.
            $dtColumn->setSearch(DataTablesSearch::parse($current[self::DATATABLES_PARAMETER_SEARCH]));

            // Add the column.
            $dtColumns[] = $dtColumn;
        }

        // Returns the columns.
        return $dtColumns;
    }

    /**
     * Set the cell type.
     *
     * @param string $cellType The cell type.
     * @return DataTablesColumn Returns this column.
     */
    public function setCellType($cellType) {
        if (false === in_array($cellType, static::dtCellTypes())) {
            $cellType = self::DATATABLES_CELL_TYPE_TD;
        }
        $this->cellType = $cellType;
        return $this;
    }

    /**
     * Set the class name.
     *
     * @param string $classname The class name.
     * @return DataTablesColumn Returns this column.
     */
    public function setClassname($classname) {
        $this->classname = $classname;
        return $this;
    }

    /**
     * Set the content padding.
     *
     * @param string $contentPadding The content padding.
     * @return DataTablesColumn Returns this column.
     */
    public function setContentPadding($contentPadding) {
        $this->contentPadding = $contentPadding;
        return $this;
    }

    /**
     * Set the data.
     *
     * @param integer|string $data The data.
     * @return DataTablesColumn Returns this column.
     */
    protected function setData($data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Set the default content.
     *
     * @param string $defaultContent The default content.
     * @return DataTablesColumn Returns this column.
     */
    public function setDefaultContent($defaultContent) {
        $this->defaultContent = $defaultContent;
        return $this;
    }

    /**
     * Set the mapping.
     *
     * @param DataTablesMappingInterface $mapping The mapping.
     * @return DataTablesColumn Returns this column.
     */
    protected function setMapping(DataTablesMappingInterface $mapping) {
        $this->mapping = $mapping;
        return $this;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return DataTablesColumn Returns this column.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the order data.
     *
     * @param integer|array $orderData The order data.
     * @return DataTablesColumn Returns this column.
     */
    public function setOrderData($orderData) {
        $this->orderData = $orderData;
        return $this;
    }

    /**
     * Set the order data type.
     *
     * @param string $orderDataType The order data type.
     * @return DataTablesColumn Returns this column.
     */
    public function setOrderDataType($orderDataType) {
        $this->orderDataType = $orderDataType;
        return $this;
    }

    /**
     * Set the order sequence.
     *
     * @param string $orderSequence The order sequence.
     * @return DataTablesColumn Returns this column.
     */
    public function setOrderSequence($orderSequence) {
        if (false === in_array($orderSequence, static::dtOrderSequences())) {
            $orderSequence = null;
        }
        $this->orderSequence = $orderSequence;
        return $this;
    }

    /**
     * Set the orderable.
     *
     * @param bool $orderable The orderable.
     * @return DataTablesColumn Returns this column.
     */
    public function setOrderable($orderable) {
        $this->orderable = $orderable;
        return $this;
    }

    /**
     * Set the search.
     *
     * @param DataTablesSearchInterface $search The search.
     * @return DataTablesColumn Returns this column.
     */
    protected function setSearch(DataTablesSearchInterface $search) {
        $this->search = $search;
        return $this;
    }

    /**
     * Set the searchable.
     *
     * @param bool $searchable The searchable.
     * @return DataTablesColumn Returns this column.
     */
    public function setSearchable($searchable) {
        $this->searchable = $searchable;
        return $this;
    }

    /**
     * Set the title.
     *
     * @param string $title The title.
     * @return DataTablesColumn Returns this column.
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the type.
     *
     * @param string $type The type.
     * @return DataTablesColumn Returns this column.
     */
    public function setType($type) {
        if (false === in_array($type, static::dtTypes())) {
            $type = null;
        }
        $this->type = $type;
        return $this;
    }

    /**
     * Set the visible.
     *
     * @param bool $visible The visible.
     * @return DataTablesColumn Returns this column.
     */
    public function setVisible($visible) {
        $this->visible = $visible;
        return $this;
    }

    /**
     * Set the width.
     *
     * @param string $width The width.
     * @return DataTablesColumn Returns this column.
     */
    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }

    /**
     * Convert into an array representing this instance.
     *
     * @return array Returns an array representing this instance.
     */
    public function toArray() {

        // Initialize the output.
        $output = [];

        ArrayHelper::set($output, "cellType", $this->cellType, [null]);
        ArrayHelper::set($output, "classname", $this->classname, [null]);
        ArrayHelper::set($output, "contentPadding", $this->contentPadding, [null]);
        ArrayHelper::set($output, "data", $this->data, [null]);
        ArrayHelper::set($output, "defaultContent", $this->defaultContent, [null]);
        ArrayHelper::set($output, "name", $this->name, [null]);
        ArrayHelper::set($output, "orderable", $this->orderable, [null, true]);
        ArrayHelper::set($output, "orderData", $this->orderData, [null]);
        ArrayHelper::set($output, "orderDataType", $this->orderDataType, [null]);
        ArrayHelper::set($output, "orderSequence", $this->orderSequence, [null]);
        ArrayHelper::set($output, "searchable", $this->searchable, [null, true]);
        ArrayHelper::set($output, "type", $this->type, [null]);
        ArrayHelper::set($output, "visible", $this->visible, [null, true]);
        ArrayHelper::set($output, "width", $this->width, [null]);

        // Return the output.
        return $output;
    }

}
