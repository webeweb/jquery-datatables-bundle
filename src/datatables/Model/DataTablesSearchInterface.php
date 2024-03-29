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

/**
 * DataTables search interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Api
 */
interface DataTablesSearchInterface {

    /**
     * Parameter "regex".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_REGEX = "regex";

    /**
     * Parameter "value".
     *
     * @var string
     */
    public const DATATABLES_PARAMETER_VALUE = "value";

    /**
     * Get the regex.
     *
     * @return bool Returns the regex.
     */
    public function getRegex(): bool;

    /**
     * Get the value.
     *
     * @return string Returns the value.
     */
    public function getValue(): string;
}
