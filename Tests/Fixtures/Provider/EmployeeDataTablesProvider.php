<?php

/**
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DatatablesBundle\Tests\Fixtures\Provider;

use WBW\Bundle\JQuery\DatatablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DatatablesBundle\Tests\Fixtures\Entity\Employee;

/**
 * Employee DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DatatablesBundle\Tests\Fixtures\Entity
 */
final class EmployeeDataTablesProvider implements DataTablesProviderInterface {

    /**
     * {@inheritdoc}
     */
    public function getColumns() {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity() {
        return Employee::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return "employee";
    }

    /**
     * {@inheritdoc}
     */
    public function getPrefix() {
        return "e";
    }

    /**
     * {@inheritdoc}
     */
    public function getView() {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function render($entity, $column) {
        return "";
    }

}
