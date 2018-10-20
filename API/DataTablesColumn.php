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
    public function __construct() {
        $this->setCellType(self::DATATABLES_CELL_TYPE_TD);
        $this->setMapping(new DataTablesMapping());
        $this->setOrderable(true);
        $this->setSearchable(true);
        $this->setVisible(true);
    }

    /**
     * {@inheritdoc}
     */
    public function getCellType() {
        return $this->cellType;
    }

    /**
     * {@inheritdoc}
     */
    public function getClassname() {
        return $this->classname;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentPadding() {
        return $this->contentPadding;
    }

    /**
     * {@inheritdoc}
     */
    public function getData() {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultContent() {
        return $this->defaultContent;
    }

    /**
     * {@inheritdoc}
     */
    public function getMapping() {
        return $this->mapping;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderData() {
        return $this->orderData;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderDataType() {
        return $this->orderDataType;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderSequence() {
        return $this->orderSequence;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderable() {
        return $this->orderable;
    }

    /**
     * {@inheritdoc}
     */
    public function getSearch() {
        return $this->search;
    }

    /**
     * {@inheritdoc}
     */
    public function getSearchable() {
        return $this->searchable;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function getType() {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function getVisible() {
        return $this->visible;
    }

    /**
     * {@inheritdoc}
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
     * Set the cell type.
     *
     * @param string $cellType The cell type.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setCellType($cellType) {
        if (false === in_array($cellType, DataTablesEnumerator::enumCellTypes())) {
            $cellType = self::DATATABLES_CELL_TYPE_TD;
        }
        $this->cellType = $cellType;
        return $this;
    }

    /**
     * Set the class name.
     *
     * @param string $classname The class name.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setClassname($classname) {
        $this->classname = $classname;
        return $this;
    }

    /**
     * Set the content padding.
     *
     * @param string $contentPadding The content padding.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setContentPadding($contentPadding) {
        $this->contentPadding = $contentPadding;
        return $this;
    }

    /**
     * Set the data.
     *
     * @param integer|string $data The data.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Set the default content.
     *
     * @param string $defaultContent The default content.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setDefaultContent($defaultContent) {
        $this->defaultContent = $defaultContent;
        return $this;
    }

    /**
     * Set the mapping.
     *
     * @param DataTablesMappingInterface $mapping The mapping.
     * @return DataTablesColumnInterface Returns this column.
     */
    protected function setMapping(DataTablesMappingInterface $mapping) {
        $this->mapping = $mapping;
        return $this;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the order data.
     *
     * @param integer|array $orderData The order data.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setOrderData($orderData) {
        $this->orderData = $orderData;
        return $this;
    }

    /**
     * Set the order data type.
     *
     * @param string $orderDataType The order data type.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setOrderDataType($orderDataType) {
        $this->orderDataType = $orderDataType;
        return $this;
    }

    /**
     * Set the order sequence.
     *
     * @param string $orderSequence The order sequence.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setOrderSequence($orderSequence) {
        if (false === in_array($orderSequence, DataTablesEnumerator::enumOrderSequences())) {
            $orderSequence = null;
        }
        $this->orderSequence = $orderSequence;
        return $this;
    }

    /**
     * Set the orderable.
     *
     * @param bool $orderable The orderable.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setOrderable($orderable) {
        $this->orderable = $orderable;
        return $this;
    }

    /**
     * Set the search.
     *
     * @param DataTablesSearchInterface $search The search.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setSearch(DataTablesSearchInterface $search) {
        $this->search = $search;
        return $this;
    }

    /**
     * Set the searchable.
     *
     * @param bool $searchable The searchable.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setSearchable($searchable) {
        $this->searchable = $searchable;
        return $this;
    }

    /**
     * Set the title.
     *
     * @param string $title The title.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the type.
     *
     * @param string $type The type.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setType($type) {
        if (false === in_array($type, DataTablesEnumerator::enumTypes())) {
            $type = null;
        }
        $this->type = $type;
        return $this;
    }

    /**
     * Set the visible.
     *
     * @param bool $visible The visible.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setVisible($visible) {
        $this->visible = $visible;
        return $this;
    }

    /**
     * Set the width.
     *
     * @param string $width The width.
     * @return DataTablesColumnInterface Returns this column.
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
