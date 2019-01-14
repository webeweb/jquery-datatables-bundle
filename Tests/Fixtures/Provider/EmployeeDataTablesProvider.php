<?php

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Provider;

use DateTime;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesCSVExporterInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity\Employee;
use WBW\Library\Core\Exception\Argument\IntegerArgumentException;
use WBW\Library\Core\Network\HTTP\HTTPInterface;

/**
 * Employee DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\JQuery\DataTablesBundle\Tests\Fixtures\Entity
 */
class EmployeeDataTablesProvider implements DataTablesProviderInterface, DataTablesCSVExporterInterface, DataTablesEditorInterface {

    /**
     * {@inheritdoc}
     */
    public function editColumn(DataTablesColumnInterface $dtColumn, $entity, $value) {

        // Switch into column data.
        switch ($dtColumn->getData()) {

            case "age":
                if (1 !== preg_match("/[0-9]{1,}/", $value)) {
                    throw new IntegerArgumentException($value);
                }
                $entity->setAge(intval($value));
                break;

            case "name":
                $entity->setName($value);
                break;

            case "office":
                $entity->setOffice($value);
                break;

            case "position":
                $entity->setPosition($value);
                break;

            case "salary":
                $entity->setSalary(intval($value));
                break;

            case "startDate":
                $entity->setStartDate(new DateTime($value));
                break;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function exportColumns() {

        // Initialize the output.
        $output = [];

        $output[] = "#";
        $output[] = "Name";
        $output[] = "Position";
        $output[] = "Office";
        $output[] = "Age";
        $output[] = "Start date";
        $output[] = "Salary";

        // Return the output.
        return $output;
    }

    /**
     * {@inheritdoc}
     */
    public function exportRow($entity) {

        // Initialize the output.
        $output = [];

        $output[] = $entity->getId();
        $output[] = $entity->getName();
        $output[] = $entity->getPosition();
        $output[] = $entity->getOffice();
        $output[] = $entity->getAge();
        if (null !== $entity->getStartDate()) {
            $output[] = $entity->getStartDate()->format("Y-m-d");
        } else {
            $output[] = "";
        }
        $output[] = $entity->getSalary();

        // Return the output.
        return $output;
    }

    /**
     * {@inheritdoc}
     */
    public function getColumns() {

        // Initialize the columns.
        $dtColumns = [];

        $dtColumns[] = DataTablesFactory::newColumn("name", "Name");
        $dtColumns[] = DataTablesFactory::newColumn("position", "Position");
        $dtColumns[] = DataTablesFactory::newColumn("office", "Office");
        $dtColumns[] = DataTablesFactory::newColumn("age", "Age");
        $dtColumns[] = DataTablesFactory::newColumn("startDate", "Start date");
        $dtColumns[] = DataTablesFactory::newColumn("salary", "Salary");
        $dtColumns[] = DataTablesFactory::newColumn("actions", "Actions")->setOrderable(false)->setSearchable(false);

        // Returns the columns.
        return $dtColumns;
    }

    /**
     * {@inheritdoc}
     */
    public function getCSVExporter() {
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEditor() {
        return $this;
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
    public function getMethod() {
        return HTTPInterface::HTTP_METHOD_POST;
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
    public function getOptions() {
        return DataTablesFactory::newOptions();
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
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity) {

        // Initialize the output.
        $output = null;

        // Switch into column data.
        switch ($dtColumn->getData()) {

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

    /**
     * {@inheritdoc}
     */
    public function renderRow($dtRow, $entity, $rowNumber) {

        // Initialize the output.
        $output = null;

        // Switch into column data.
        switch ($dtRow) {

            case DataTablesResponseInterface::DATATABLES_ROW_ATTR:
                break;

            case DataTablesResponseInterface::DATATABLES_ROW_CLASS:
                $output = (0 === $rowNumber % 2 ? "even" : "odd");
                break;

            case DataTablesResponseInterface::DATATABLES_ROW_DATA:
                $output = ["pkey" => $entity->getId()];
                break;

            case DataTablesResponseInterface::DATATABLES_ROW_ID:
                $output = "employee_" . $entity->getId();
                break;
        }

        // Return the output.
        return $output;
    }
}
