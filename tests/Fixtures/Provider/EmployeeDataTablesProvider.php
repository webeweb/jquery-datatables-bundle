<?php

declare(strict_types = 1);

/*
 * This file is part of the jquery-datatables-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Provider;

use DateTime;
use WBW\Bundle\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\DataTablesBundle\Model\DataTablesColumnInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesOptionsInterface;
use WBW\Bundle\DataTablesBundle\Model\DataTablesResponseInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesCsvExporterInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\DataTablesBundle\Provider\DataTablesProviderInterface;
use WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity\Employee;
use WBW\Library\Common\Exception\IntegerArgumentException;

/**
 * Employee DataTables provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity
 */
class EmployeeDataTablesProvider implements DataTablesProviderInterface, DataTablesCsvExporterInterface, DataTablesEditorInterface {

    /**
     * {@inheritDoc}
     */
    public function editColumn(DataTablesColumnInterface $dtColumn, $entity, $value): void {

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
     * {@inheritDoc}
     */
    public function exportColumns(): array {

        return [
            "#",
            "Name",
            "Position",
            "Office",
            "Age",
            "Start date",
            "Salary",
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function exportRow($entity): array {

        return [
            $entity->getId(),
            $entity->getName(),
            $entity->getPosition(),
            $entity->getOffice(),
            $entity->getAge(),
            null !== $entity->getStartDate() ? $entity->getStartDate()->format("Y-m-d") : "",
            $entity->getSalary(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getColumns(): array {

        $dtColumns = [];

        $dtColumns[] = DataTablesFactory::newColumn("name", "Name");
        $dtColumns[] = DataTablesFactory::newColumn("position", "Position");
        $dtColumns[] = DataTablesFactory::newColumn("office", "Office");
        $dtColumns[] = DataTablesFactory::newColumn("age", "Age");
        $dtColumns[] = DataTablesFactory::newColumn("startDate", "Start date");
        $dtColumns[] = DataTablesFactory::newColumn("salary", "Salary");
        $dtColumns[] = DataTablesFactory::newColumn("actions", "Actions")
            ->setOrderable(false)
            ->setSearchable(false);

        return $dtColumns;
    }

    /**
     * {@inheritDoc}
     */
    public function getCsvExporter(): ?DataTablesCsvExporterInterface {
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEditor(): ?DataTablesEditorInterface {
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEntity(): string {
        return Employee::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): string {
        return "POST";
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string {
        return "employee";
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): DataTablesOptionsInterface {
        return DataTablesFactory::newOptions();
    }

    /**
     * {@inheritDoc}
     */
    public function getPrefix(): string {
        return "e";
    }

    /**
     * {@inheritDoc}
     */
    public function getView(): ?string {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity) {

        $output = null;

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

        return $output;
    }

    /**
     * {@inheritDoc}
     */
    public function renderRow(string $dtRow, $entity, int $rowNumber) {

        $output = null;

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

        return $output;
    }
}
