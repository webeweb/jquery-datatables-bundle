<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Provider;

use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;

/**
 * DataTables editor interface.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Provider
 */
interface DataTablesEditorInterface {

    /**
     * Edit a column.
     *
     * @param DataTablesColumn $dtColumn The column.
     * @param object $entity The entity.
     * @return void.
     */
    public function editColumn(DataTablesColumn $dtColumn, $entity, $value);
}
