<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Provider;

use Exception;
use WBW\Bundle\CoreBundle\Provider\ProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;

/**
 * DataTables editor interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Provider
 */
interface DataTablesEditorInterface extends ProviderInterface {

    /**
     * Edit a column.
     *
     * @param DataTablesColumnInterface $dtColumn The column.
     * @param object $entity The entity.
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function editColumn(DataTablesColumnInterface $dtColumn, $entity, $value);
}
