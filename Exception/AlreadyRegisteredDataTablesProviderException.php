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

namespace WBW\Bundle\DataTablesBundle\Exception;

/**
 * Already registered DataTables provider exception.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Exception
 */
class AlreadyRegisteredDataTablesProviderException extends AbstractDataTablesException {

    /**
     * Constructor.
     *
     * @param string $name The name.
     */
    public function __construct(string $name) {
        $format = 'A DataTables provider with name "%s" is already registered';
        parent::__construct(sprintf($format, $name));
    }
}
