<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Bundle\DataTablesBundle\Provider;

use Throwable;
use WBW\Bundle\CommonBundle\Provider\ProviderInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;

/**
 * DataTables editor interface.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Provider
 */
interface DataTablesEditorInterface extends ProviderInterface {

    /**
     * Edit a column.
     *
     * @param DataTablesColumnInterface $dtColumn The column.
     * @param object $entity The entity.
     * @param mixed $value The value.
     * @return void
     * @throws Throwable Throws an exception if an error occurs.
     */
    public function editColumn(DataTablesColumnInterface $dtColumn, $entity, $value);
}
