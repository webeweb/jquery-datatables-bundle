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

use UnexpectedValueException;

/**
 * DataTables column.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\API
 */
class DataTablesColumn implements DataTablesColumnInterface {

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

        $this->getMapping()->setParent($this);
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
    public function setCellType($cellType) {
        if (false === in_array($cellType, DataTablesEnumerator::enumCellTypes())) {
            $cellType = self::DATATABLES_CELL_TYPE_TD;
        }
        $this->cellType = $cellType;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setClassname($classname) {
        $this->classname = $classname;
        return $this;
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function setOrderable($orderable) {
        $this->orderable = $orderable;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setSearch(DataTablesSearchInterface $search) {
        $this->search = $search;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setSearchable($searchable) {
        $this->searchable = $searchable;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type) {
        if (false === in_array($type, DataTablesEnumerator::enumTypes())) {
            throw new UnexpectedValueException(sprintf("The type \"%s\" is invalid", $type));
        }
        $this->type = $type;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setVisible($visible) {
        $this->visible = $visible;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }
}
