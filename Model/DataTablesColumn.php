<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Model;

use InvalidArgumentException;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesMappingInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Api\DataTablesSearchInterface;

/**
 * DataTables column.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Model
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
     * @var string|null
     */
    private $classname;

    /**
     * Content padding.
     *
     * @var string|null
     */
    private $contentPadding;

    /**
     * Data.
     *
     * @var string|null
     */
    private $data;

    /**
     * Default content.
     *
     * @var string|null
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
     * @var string|null
     */
    private $name;

    /**
     * Order data.
     *
     * @var array|null
     */
    private $orderData;

    /**
     * Order data type.
     *
     * @var string|null
     */
    private $orderDataType;

    /**
     * Order sequence.
     *
     * @var string|null
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
     * @var DataTablesSearchInterface|null
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
     * @var string|null
     */
    private $title;

    /**
     * Type.
     *
     * @var string|null
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
     * @var string|null
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
     * {@inheritDoc}
     */
    public function getCellType(): string {
        return $this->cellType;
    }

    /**
     * {@inheritDoc}
     */
    public function getClassname(): ?string {
        return $this->classname;
    }

    /**
     * {@inheritDoc}
     */
    public function getContentPadding(): ?string {
        return $this->contentPadding;
    }

    /**
     * {@inheritDoc}
     */
    public function getData(): ?string {
        return $this->data;
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultContent(): ?string {
        return $this->defaultContent;
    }

    /**
     * {@inheritDoc}
     */
    public function getMapping(): DataTablesMappingInterface {
        return $this->mapping;
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderData(): ?array {
        return $this->orderData;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderDataType(): ?string {
        return $this->orderDataType;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderSequence(): ?string {
        return $this->orderSequence;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderable(): bool {
        return $this->orderable;
    }

    /**
     * {@inheritDoc}
     */
    public function getSearch(): ?DataTablesSearchInterface {
        return $this->search;
    }

    /**
     * {@inheritDoc}
     */
    public function getSearchable(): bool {
        return $this->searchable;
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * {@inheritDoc}
     */
    public function getType(): ?string {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     */
    public function getVisible(): bool {
        return $this->visible;
    }

    /**
     * {@inheritDoc}
     */
    public function getWidth(): ?string {
        return $this->width;
    }

    /**
     * {@inheritDoc}
     */
    public function setCellType(string $cellType): DataTablesColumnInterface {
        if (false === in_array($cellType, DataTablesEnumerator::enumCellTypes())) {
            $cellType = self::DATATABLES_CELL_TYPE_TD;
        }
        $this->cellType = $cellType;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setClassname(?string $classname): DataTablesColumnInterface {
        $this->classname = $classname;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setContentPadding(?string $contentPadding): DataTablesColumnInterface {
        $this->contentPadding = $contentPadding;
        return $this;
    }

    /**
     * Set the data.
     *
     * @param string|null $data The data.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setData(?string $data): DataTablesColumnInterface {
        $this->data = $data;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultContent(?string $defaultContent): DataTablesColumnInterface {
        $this->defaultContent = $defaultContent;
        return $this;
    }

    /**
     * Set the mapping.
     *
     * @param DataTablesMappingInterface $mapping The mapping.
     * @return DataTablesColumnInterface Returns this column.
     */
    protected function setMapping(DataTablesMappingInterface $mapping): DataTablesColumnInterface {
        $this->mapping = $mapping;
        return $this;
    }

    /**
     * Set the name.
     *
     * @param string|null $name The name.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setName(?string $name): DataTablesColumnInterface {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the order data.
     *
     * @param array|null $orderData The order data.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setOrderData(?array $orderData): DataTablesColumnInterface {
        $this->orderData = $orderData;
        return $this;
    }

    /**
     * Set the order data type.
     *
     * @param string|null $orderDataType The order data type.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setOrderDataType(?string $orderDataType): DataTablesColumnInterface {
        $this->orderDataType = $orderDataType;
        return $this;
    }

    /**
     * Set the order sequence.
     *
     * @param string|null $orderSequence The order sequence.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setOrderSequence(?string $orderSequence): DataTablesColumnInterface {
        if (false === in_array($orderSequence, DataTablesEnumerator::enumOrderSequences())) {
            $orderSequence = null;
        }
        $this->orderSequence = $orderSequence;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderable(bool $orderable): DataTablesColumnInterface {
        $this->orderable = $orderable;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setSearch(?DataTablesSearchInterface $search): DataTablesColumnInterface {
        $this->search = $search;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setSearchable(bool $searchable): DataTablesColumnInterface {
        $this->searchable = $searchable;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setTitle(?string $title): DataTablesColumnInterface {
        $this->title = $title;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setType(?string $type): DataTablesColumnInterface {
        if (false === in_array($type, DataTablesEnumerator::enumTypes())) {
            throw new InvalidArgumentException(sprintf('The type "%s" is invalid', $type));
        }
        $this->type = $type;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setVisible(bool $visible): DataTablesColumnInterface {
        $this->visible = $visible;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setWidth(?string $width): DataTablesColumnInterface {
        $this->width = $width;
        return $this;
    }
}
