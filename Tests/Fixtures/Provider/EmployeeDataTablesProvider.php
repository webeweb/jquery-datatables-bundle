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

use WBW\Bundle\JQuery\DatatablesBundle\API\DataTablesColumn;
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

        // Initialize the columns.
        $dtColumns = [];

        $dtColumns[] = DataTablesColumn::newInstance("name", "Name");
        $dtColumns[] = DataTablesColumn::newInstance("position", "Position");
        $dtColumns[] = DataTablesColumn::newInstance("office", "Office");
        $dtColumns[] = DataTablesColumn::newInstance("age", "Age");
        $dtColumns[] = DataTablesColumn::newInstance("startDate", "Start date");
        $dtColumns[] = DataTablesColumn::newInstance("salary", "Salary");
        $dtColumns[] = DataTablesColumn::newInstance("actions", "Actions");

        // Returns the columns.
        return $dtColumns;
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
    public function render(DataTablesColumn $column, $entity) {

        // Initialize the output.
        $output = null;

        // Switch into column name.
        switch ($column->getName()) {

            case "actions":
                $output = "";
                break;

            case "age":
                $output = $entity->getAge();
                break;

            case "name":
                $output = $entity->getName();
                break;

            case "office":
                $output = $entity->getOffice();
                break;

            case "position":
                $output = $entity->getPosition();
                break;

            case "salary":
                $output = $entity->getSalary();
                break;

            case "startDate":
                if (null !== $entity->getStartDate()) {
                    $output = $entity->getStartDate()->format("Y-m-d");
                }
                break;
        }

        // Return the output.
        return $output;
    }

}
