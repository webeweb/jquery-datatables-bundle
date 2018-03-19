<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\API\Column;

use JsonSerializable;
use WBW\Bundle\JQuery\DatatablesBundle\API\Mapping\DataTablesMapping;

/**
 * DataTables column.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\API\Column
 * @final
 */
final class DataTablesColumn implements JsonSerializable {

    /**
     * Cell type.
     *
     * @var string
     */
    private $cellType = "td";

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
     * DataTables mapping.
     *
     * @var DataTablesMapping
     */
    private $dataTablesMapping;

    /**
     * Default content.
     *
     * @var string
     */
    private $defaultContent;

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
     * @var boolean
     */
    private $orderable = true;

    /**
     * Searchable.
     *
     * @var boolean
     */
    private $searchable = true;

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
     * @var boolean
     */
    private $visible = true;

    /**
     * Width.
     *
     * @var string
     */
    private $width;

    /**
     * Constructor.
     *
     * @param string $name The column name.
     * @param string $title The column title.
     * @param string $cellType The column cell type.
     */
    public function __construct($name, $title, $cellType = "td") {
        $this->dataTablesMapping = new DataTablesMapping();
        $this->dataTablesMapping->setColumn($name);

        $this->setCellType($cellType);
        $this->setData($name);
        $this->setName($name);
        $this->setTitle($title);
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
     * Get the DataTables mapping.
     *
     * @return DataTablesMapping Returns the DataTables mapping.
     */
    public function getDataTablesMapping() {
        return $this->dataTablesMapping;
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
     * @return boolean Returns the orderable.
     */
    public function getOrderable() {
        return $this->orderable;
    }

    /**
     * Get the searchable.
     *
     * @return boolean Returns the searchable.
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
     * @return boolean Returns the visible.
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
     * Set the cell type.
     *
     * @param string $cellType The cell type.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setCellType($cellType) {
        switch ($cellType) {
            case "td":
            case "th":
                $this->cellType = $cellType;
                break;
            default:
                $this->cellType = "td";
        }
        return $this;
    }

    /**
     * Set the class name.
     *
     * @param string $classname The class name.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setClassname($classname) {
        $this->classname = $classname;
        return $this;
    }

    /**
     * Set the content padding.
     *
     * @param string $contentPadding The content padding.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setContentPadding($contentPadding) {
        $this->contentPadding = $contentPadding;
        return $this;
    }

    /**
     * Set the data.
     *
     * @param integer|strign $data The data.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Set the default content.
     *
     * @param string $defaultContent The default content.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setDefaultContent($defaultContent) {
        $this->defaultContent = $defaultContent;
        return $this;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the order data.
     *
     * @param integer|array $orderData The order data.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setOrderData($orderData) {
        $this->orderData = $orderData;
        return $this;
    }

    /**
     * Set the order data type.
     *
     * @param string $orderDataType The order data type.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setOrderDataType($orderDataType) {
        $this->orderDataType = $orderDataType;
        return $this;
    }

    /**
     * Set the order sequence.
     *
     * @param string $orderSequence The order sequence.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setOrderSequence($orderSequence) {
        switch ($orderSequence) {
            case "asc":
            case "desc":
                $this->orderSequence = $orderSequence;
                break;
            default:
                $this->orderSequence = null;
        }
        return $this;
    }

    /**
     * Set the orderable.
     *
     * @param boolean $orderable The orderable.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setOrderable($orderable) {
        $this->orderable = $orderable;
        return $this;
    }

    /**
     * Set the searchable.
     *
     * @param boolean $searchable The searchable.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setSearchable($searchable) {
        $this->searchable = $searchable;
        return $this;
    }

    /**
     * Set the title.
     *
     * @param string $title The title.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the type.
     *
     * @param string $type The type.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setType($type) {
        switch ($type) {
            case "date":
            case "num":
            case "num-fmt":
            case "html":
            case "html-num":
            case "string":
                $this->type = $type;
                break;
            default :
                $this->type = null;
        }
        return $this;
    }

    /**
     * Set the visible.
     *
     * @param boolean $visible The visible.
     * @return DataTablesColumn Returns the DataTables column.
     */
    public function setVisible($visible) {
        $this->visible = $visible;
        return $this;
    }

    /**
     * Set the width.
     *
     * @param string $width The width.
     * @return DataTablesColumn Returns the DataTables column.
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

        if (null !== $this->cellType) {
            $output["cellType"] = $this->cellType;
        }
        if (null !== $this->classname) {
            $output["classname"] = $this->classname;
        }
        if (null !== $this->contentPadding) {
            $output["contentPadding"] = $this->contentPadding;
        }
        if (null !== $this->data) {
            $output["data"] = $this->data;
        }
        if (null !== $this->defaultContent) {
            $output["defaultContent"] = $this->defaultContent;
        }
        if (null !== $this->name) {
            $output["name"] = $this->name;
        }
        if (null !== $this->orderable && false === $this->orderable) {
            $output["orderable"] = $this->orderable;
        }
        if (null !== $this->orderData) {
            $output["orderData"] = $this->orderData;
        }
        if (null !== $this->orderDataType) {
            $output["orderDataType"] = $this->orderDataType;
        }
        if (null !== $this->orderSequence) {
            $output["orderSequence"] = $this->orderSequence;
        }
        if (null !== $this->searchable && false === $this->searchable) {
            $output["searchable"] = $this->searchable;
        }
        if (null !== $this->title) {
            $output["title"] = $this->title;
        }
        if (null !== $this->type) {
            $output["type"] = $this->type;
        }
        if (null !== $this->visible && false === $this->visible) {
            $output["visible"] = $this->visible;
        }
        if (null !== $this->width) {
            $output["width"] = $this->width;
        }

        // Return the output.
        return $output;
    }

}
