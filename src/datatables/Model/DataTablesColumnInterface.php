<?php

declare(strict_types = 1);

/*
 * This file is part of the datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Model;

use InvalidArgumentException;
use WBW\Bundle\DataTablesBundle\Api\DataTablesMappingInterface;
use WBW\Bundle\DataTablesBundle\Api\DataTablesSearchInterface;

/**
 * DataTables column interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Api
 */
interface DataTablesColumnInterface {

    /**
     * Cell type "td".
     *
     * @var string
     */
    public const DATATABLES_CELL_TYPE_TD = "td";

    /**
     * Cell type "th".
     *
     * @var string
     */
    public const DATATABLES_CELL_TYPE_TH = "th";

    /**
     * Order sequence "asc".
     *
     * @var string
     */
    public const DATATABLES_ORDER_SEQUENCE_ASC = "asc";

    /**
     * Order sequence "desc".
     *
     * @var string
     */
    public const DATATABLES_ORDER_SEQUENCE_DESC = "desc";

    /**
     * Parameter "data".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_DATA = "data";

    /**
     * Parameter "name".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_NAME = "name";

    /**
     * Parameter "search".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_SEARCH = "search";

    /**
     * Type "date".
     *
     * @var string
     */
    public const DATATABLES_TYPE_DATE = "date";

    /**
     * Type "html".
     *
     * @var string
     */
    public const DATATABLES_TYPE_HTML = "html";

    /**
     * Type "html-num".
     *
     * @var string
     */
    public const DATATABLES_TYPE_HTML_NUM = "html-num";

    /**
     * Type "num".
     *
     * @var string
     */
    public const DATATABLES_TYPE_NUM = "num";

    /**
     * Type "num-fmt".
     *
     * @var string
     */
    public const DATATABLES_TYPE_NUM_FMT = "num-fmt";

    /**
     * Type "string".
     *
     * @var string
     */
    public const DATATABLES_TYPE_STRING = "string";

    /**
     * Get the cell type.
     *
     * @return string Returns the cell type.
     */
    public function getCellType(): string;

    /**
     * Get the class name.
     *
     * @return string|null Returns the class name.
     */
    public function getClassname(): ?string;

    /**
     * Get the content padding.
     *
     * @return string|null Returns the content padding.
     */
    public function getContentPadding(): ?string;

    /**
     * Get the data.
     *
     * @return string|null Returns the data.
     */
    public function getData(): ?string;

    /**
     * Get the default content
     *
     * @return string|null Returns the default content.
     */
    public function getDefaultContent(): ?string;

    /**
     * Get the mapping.
     *
     * @return DataTablesMappingInterface The mapping.
     */
    public function getMapping(): DataTablesMappingInterface;

    /**
     * Get the name.
     *
     * @return string|null Returns the name.
     */
    public function getName(): ?string;

    /**
     * Get the order data.
     *
     * @return mixed[]|null Returns the order data.
     */
    public function getOrderData(): ?array;

    /**
     * Get the order data type.
     *
     * @return string|null Returns the order data type.
     */
    public function getOrderDataType(): ?string;

    /**
     * Get the order sequence.
     *
     * @return string|null Returns the order sequence.
     */
    public function getOrderSequence(): ?string;

    /**
     * Get the orderable.
     *
     * @return bool Returns the orderable.
     */
    public function getOrderable(): bool;

    /**
     * Get the search.
     *
     * @return DataTablesSearchInterface|null Returns the search.
     */
    public function getSearch(): ?DataTablesSearchInterface;

    /**
     * Get the searchable.
     *
     * @return bool Returns the searchable.
     */
    public function getSearchable(): bool;

    /**
     * Get the title.
     *
     * @return string|null Returns the title.
     */
    public function getTitle(): ?string;

    /**
     * Get the type.
     *
     * @return string|null Returns the type.
     */
    public function getType(): ?string;

    /**
     * Get the visible.
     *
     * @return bool Returns the visible.
     */
    public function getVisible(): bool;

    /**
     * Get the width.
     *
     * @return string|null Returns the width.
     */
    public function getWidth(): ?string;

    /**
     * Set the cell type.
     *
     * @param string $cellType The cell type.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setCellType(string $cellType): DataTablesColumnInterface;

    /**
     * Set the class name.
     *
     * @param string|null $classname The class name.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setClassname(?string $classname): DataTablesColumnInterface;

    /**
     * Set the content padding.
     *
     * @param string|null $contentPadding The content padding.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setContentPadding(?string $contentPadding): DataTablesColumnInterface;

    /**
     * Set the default content.
     *
     * @param string|null $defaultContent The default content.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setDefaultContent(?string $defaultContent): DataTablesColumnInterface;

    /**
     * Set the orderable.
     *
     * @param bool $orderable The orderable.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setOrderable(bool $orderable): DataTablesColumnInterface;

    /**
     * Set the search.
     *
     * @param DataTablesSearchInterface|null $search The search.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setSearch(?DataTablesSearchInterface $search): DataTablesColumnInterface;

    /**
     * Set the searchable.
     *
     * @param bool $searchable The searchable.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setSearchable(bool $searchable): DataTablesColumnInterface;

    /**
     * Set the title.
     *
     * @param string|null $title The title.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setTitle(?string $title): DataTablesColumnInterface;

    /**
     * Set the type.
     *
     * @param string|null $type The type.
     * @return DataTablesColumnInterface Returns this column.
     * @throws InvalidArgumentException Throws an invalid argument exception if the type is invalid.
     */
    public function setType(?string $type): DataTablesColumnInterface;

    /**
     * Set the visible.
     *
     * @param bool $visible The visible.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setVisible(bool $visible): DataTablesColumnInterface;

    /**
     * Set the width.
     *
     * @param string|null $width The width.
     * @return DataTablesColumnInterface Returns this column.
     */
    public function setWidth(?string $width): DataTablesColumnInterface;
}
