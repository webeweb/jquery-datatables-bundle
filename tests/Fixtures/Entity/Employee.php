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

namespace WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity;

use DateTime;
use WBW\Library\Traits\Integers\IntegerIdTrait;

/**
 * Employee entity.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Bundle\DataTablesBundle\Tests\Fixtures\Entity
 */
class Employee {

    use IntegerIdTrait;

    /**
     * Age.
     *
     * @var int|null
     */
    private $age;

    /**
     * Name.
     *
     * @var string|null
     */
    private $name;

    /**
     * Office.
     *
     * @var string|null
     */
    private $office;

    /**
     * Position.
     *
     * @var string|null
     */
    private $position;

    /**
     * Salary.
     *
     * @var int|null
     */
    private $salary;

    /**
     * Start date.
     *
     * @var DateTime|null
     */
    private $startDate;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO
    }

    /**
     * Get the age.
     *
     * @return int|null Returns the age.
     */
    public function getAge(): ?int {
        return $this->age;
    }

    /**
     * Get the name.
     *
     * @return string|null Returns the name.
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Get the office.
     *
     * @return string|null Returns the office.
     */
    public function getOffice(): ?string {
        return $this->office;
    }

    /**
     * Get the position.
     *
     * @return string|null Returns the position.
     */
    public function getPosition(): ?string {
        return $this->position;
    }

    /**
     * Get the salary.
     *
     * @return int|null Returns the salary.
     */
    public function getSalary(): ?int {
        return $this->salary;
    }

    /**
     * Get the start date.
     *
     * @return DateTime|null Returns the start date.
     */
    public function getStartDate(): ?DateTime {
        return $this->startDate;
    }

    /**
     * Set the age.
     *
     * @param int|null $age The age.
     * @return Employee Returns this employee.
     */
    public function setAge(?int $age): Employee {
        $this->age = $age;
        return $this;
    }

    /**
     * Set the name.
     *
     * @param string|null $name The name.
     * @return Employee Returns this employee.
     */
    public function setName(?string $name): Employee {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the office.
     *
     * @param string|null $office The office.
     * @return Employee Returns this employee.
     */
    public function setOffice(?string $office): Employee {
        $this->office = $office;
        return $this;
    }

    /**
     * Set the position.
     *
     * @param string|null $position The position.
     * @return Employee Returns this employee.
     */
    public function setPosition(?string $position): Employee {
        $this->position = $position;
        return $this;
    }

    /**
     * Set the salary.
     *
     * @param int|null $salary The salary.
     * @return Employee Returns this employee.
     */
    public function setSalary(?int $salary): Employee {
        $this->salary = $salary;
        return $this;
    }

    /**
     * Set the start date.
     *
     * @param DateTime|null $startDate The start date.
     * @return Employee Returns this employee.
     */
    public function setStartDate(?DateTime $startDate): Employee {
        $this->startDate = $startDate;
        return $this;
    }
}
