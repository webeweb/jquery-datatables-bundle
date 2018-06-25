jquery-datatables-bundle
========================

[![Build Status](https://travis-ci.org/webeweb/jquery-datatables-bundle.svg?branch=master)](https://travis-ci.org/webeweb/jquery-datatables-bundle) [![Coverage Status](https://coveralls.io/repos/github/webeweb/jquery-datatables-bundle/badge.svg?branch=master)](https://coveralls.io/github/webeweb/jquery-datatables-bundle?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webeweb/jquery-datatables-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/webeweb/jquery-datatables-bundle/?branch=master) [![Latest Stable Version](https://poser.pugx.org/webeweb/jquery-datatables-bundle/v/stable)](https://packagist.org/packages/webeweb/jquery-datatables-bundle) [![Latest Unstable Version](https://poser.pugx.org/webeweb/jquery-datatables-bundle/v/unstable)](https://packagist.org/packages/webeweb/jquery-datatables-bundle) [![License](https://poser.pugx.org/webeweb/jquery-datatables-bundle/license)](https://packagist.org/packages/webeweb/jquery-datatables-bundle) [![composer.lock](https://poser.pugx.org/webeweb/jquery-datatables-bundle/composerlock)](https://packagist.org/packages/webeweb/jquery-datatables-bundle)

Integrate jQuery Datatable with Symfony 2.

> IMPORTANT NOTICE: This package is still under development. Any changes will be
> done without prior notice to consumers of this package. Of course this code
> will become stable at a certain point, but for now, use at your own risk.

<img src="https://raw.githubusercontent.com/webeweb/jquery-datatables-bundle/master/Resources/doc/images/jquery-datatables-bundle_380x550.png" alt="jQuery DataTables bundle" align="right" height="456"/>

Includes :

- [DataTables 1.10.16](https://datatables.net/)
- [DataTables AutoFill 2.2.2](https://datatables.net/extensions/autofill/) (DataTables plugin)
- [DataTables Buttons 1.5.1](https://datatables.net/extensions/buttons/) (DataTables plugin)
- DataTables JSZip 2.5.0
- DataTables pdfmake 0.1.32
- [DataTables ColReorder 1.4.1](https://datatables.net/extensions/colreorder/) (DataTables plugin)
- [DataTables FixedColumns 3.2.4](https://datatables.net/extensions/fixedcolumns/) (DataTables plugin)
- [DataTables FixedHeader 3.1.3](https://datatables.net/extensions/fixedheader/) (DataTables plugin)
- [DataTables KeyTable 2.3.2](https://datatables.net/extensions/keytable/) (DataTables plugin)
- [DataTables Responsive 2.2.1](https://datatables.net/extensions/responsive/) (DataTables plugin)
- [DataTables RowGroup 1.0.2](https://datatables.net/extensions/rowgroup/) (DataTables plugin)
- [DataTables RowReorder 1.2.3](https://datatables.net/extensions/rowreorder/) (DataTables plugin)
- [DataTables Scroller 1.4.4](https://datatables.net/extensions/scroller/) (DataTables plugin)
- [DataTables Select 1.2.5](https://datatables.net/extensions/select/) (DataTables plugin)
- [editableTable](https://github.com/mindmup/editable-table/)
- [jQuery 3.2.1](http://jquery.com/) (DataTables dependency)

---

## Compatibility

[![PHP](https://img.shields.io/badge/PHP-%5E5.6%7C%5E7.0-blue.svg)](http://php.net) [![Symfony](https://img.shields.io/badge/Symfony-%5E2.6%7C%5E3.0-brightgreen.svg)](https://symfony.com)

---

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
$ composer require webeweb/jquery-datatables-bundle "^1.0"
```

This command requires you to have Composer installed globally, as explained in
the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
    public function registerBundles() {
        $bundles = [
            // ...
            new WBW\Bundle\BootstrapBundle\BootstrapBundle(), // for use bundle templates
            new WBW\Bundle\JQuery\DataTablesBundle\JQueryDataTablesBundle(),
        ];

        // ...

        return $bundles;
    }
```

Add the bundle routing in the `app/config/routing.yml` file of your project:

```yaml
# ...
jquery_datatables:
    prefix:   "/"
    resource: "@JQueryDataTablesBundle/Resources/config/routing.yml"

```

Once the bundle is added then do:

```bash
$ php bin/console assets:install
```

---

## Usage

### 1) Entity

Create an entity in the `src/AppBundle/Entity` directory of your project:

```php
namespace AppBundle\Entity;

use DateTime;

/**
 * Employee entity.
 */
class Employee {

    /**
     * Age.
     *
     * @var integer
     */
    private $age;

    /**
     * Id.
     *
     * @var integer
     */
    private $id;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Office.
     *
     * @var string
     */
    private $office;

    /**
     * Position.
     *
     * @var string
     */
    private $position;

    /**
     * Salary.
     *
     * @var integer
     */
    private $salary;

    /**
     * Start date.
     *
     * @var DateTime
     */
    private $startDate;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the age.
     *
     * @return integer Returns the age.
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * Get the id.
     *
     * @return integer Returns the id.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get the office.
     *
     * @return string Returns the office.
     */
    public function getOffice() {
        return $this->office;
    }

    /**
     * Get the position.
     *
     * @return string Returns the position.
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * Get the salary.
     *
     * @return integer Returns the salary.
     */
    public function getSalary() {
        return $this->salary;
    }

    /**
     * Get the start date.
     *
     * @return DateTime Returns the start date.
     */
    public function getStartDate() {
        return $this->startDate;
    }

    /**
     * Set the age.
     *
     * @param integer $age The age.
     * @return Employee Returns this employee.
     */
    public function setAge($age) {
        $this->age = $age;
        return $this;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return Employee Returns this employee.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the office.
     *
     * @param string $office The office.
     * @return Employee Returns this employee.
     */
    public function setOffice($office) {
        $this->office = $office;
        return $this;
    }

    /**
     * Set the position.
     *
     * @param string $position The position.
     * @return Employee Returns this employee.
     */
    public function setPosition($position) {
        $this->position = $position;
        return $this;
    }

    /**
     * Set the salary.
     *
     * @param integer $salary The salary.
     * @return Employee Returns this employee.
     */
    public function setSalary($salary) {
        $this->salary = $salary;
        return $this;
    }

    /**
     * Set the start date.
     *
     * @param DateTime $startDate The start date.
     * @return Employee Returns this employee.
     */
    public function setStartDate($startDate) {
        $this->startDate = $startDate;
        return $this;
    }

}
```

### 2) Repository

Create a repository in the `src/AppBundle/Repository` directory of your project:

```php
namespace AppBundle\Repository;

use WBW\Bundle\JQuery\DataTablesBundle\Repository\DefaultDataTablesRepository;

/**
 * Employee repository.
 */
class EmployeeRepository extends DefaultDataTablesRepository {

}
```

### 3) Provider

Create a provider in the `src/AppBundle/Provider` directory of your project:

```php
namespace AppBundle\Provider;

use AppBundle\Entity\Employee;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumn;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * Employee DataTables provider.
 */
class EmployeeDataTablesProvider implements DataTablesProviderInterface {

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

        $dtColumns[] = DataTablesColumn::newInstance("name", "Name");
        $dtColumns[] = DataTablesColumn::newInstance("position", "Position");
        $dtColumns[] = DataTablesColumn::newInstance("office", "Office");
        $dtColumns[] = DataTablesColumn::newInstance("age", "Age");
        $dtColumns[] = DataTablesColumn::newInstance("startDate", "Start date");
        $dtColumns[] = DataTablesColumn::newInstance("salary", "Salary");
        $dtColumns[] = DataTablesColumn::newInstance("actions", "Actions")->setOrderable(false)->setSearchable(false);

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
    public function getMethod() {
        return "POST";
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
    public function renderColumn(DataTablesColumn $dtColumn, $entity) {

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

            case self::DATATABLES_ROW_ATTR:
                break;

            case self::DATATABLES_ROW_CLASS:
                $output = (0 === $rowNumber % 2 ? "even" : "odd");
                break;

            case self::DATATABLES_ROW_DATA:
                $output = ["pkey" => $entity->getId()];
                break;

            case self::DATATABLES_ROW_ID:
                $output = "row_" . $entity->getId();
                break;
        }

        // Return the output.
        return $output;
    }

}
```

> IMPORTANT NOTICE:
>
> getName() return the parameter "name" used in the bundle route.
>
> getView() return the view used by the DataTables controller.
> - return something like "@App/Employe/index.html.twig" for use your template
> - return null for use the bundle template

Add this provider in the `app/config/services.yml` file of your project:

```yaml
services:
    # ...
    app.datatables.provider.employee:
        class: AppBundle\Provider\EmployeeDataTablesProvider
        tags:
            - { name: "webeweb.jquerydatatables.provider" }
```

You can add as many providers as you want as long as the name of the providers are different.

### 4) Template (for custom rendering)

Create a template in the `src/AppBundle/Resources/views/Employee`directory of your project:

```html
{# src/AppBundle/Resources/views/Employee/index.html.twig #}

{% block stylesheet %}
    {{ parent() }}
    {% include "@JQueryDataTables/include/styles.html.twig" with {"theme": "bootstrap" } %}
{% endblock %}

{% block content %}
    {{ dataTablesHTML(dtWrapper) }}
{% endblock %}

{% block javascript %}
    {{ parent() }}
    {% include "@JQueryDataTables/include/scripts.html.twig" with {"theme": "bootstrap" } %}
    {{ dataTablesJS(dtWrapper) }}
{% endblock %}
```

### 5) Enjoy

Open you browser at http://localhost:8000/app_dev.php/datatables/employee/index.

### 6) Join column

Create a new entity in the `src/AppBundle/Entity`directory of your project:

```php
namespace AppBundle\Entity;

use DateTime;

/**
 * Office entity.
 */
class Office {

    /**
     * Id.
     *
     * @var integer
     */
    private $id;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the id.
     *
     * @return integer Returns the id.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the name.
     *
     * @return string Returns the name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set the name.
     *
     * @param string $name The name.
     * @return Office Returns this office.
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}
```

Modify the entity in the `src/AppBundle/Entity/Employee.php` file of your project like this:

```php
class Employee {

    // ...

    /**
     * Office.
     *
     * @var Office
     */
    private $office;

    // ...

    /**
     * Get the office.
     *
     * @return Office Returns the office.
     */
    public function getOffice() {
        return $this->office;
    }

    // ...

    /**
     * Set the office.
     *
     * @param Office $office The office.
     * @return Employee Returns this employee.
     */
    public function setOffice(Office $office) {
        $this->office = $office;
        return $this;
    }

    // ...

}
```

Modify the repository in the `src/AppBundle/Repository/EmployeeRepository.php` file of your project like this:

```php
class EmployeeRepository extends DefaultDataTablesRepository {

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountFiltered(DataTablesWrapper $dtWrapper) {

        // Create a query builder.
        $qb = $this->buildDataTablesCountFiltered($dtWrapper);
        $qb->leftJoin("e.office", "o");

        // Return the result.
        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountTotal(DataTablesWrapper $dtWrapper) {

        // Create a query builder.
        $qb = $this->buildDataTablesCountTotal($dtWrapper);
        $qb->leftJoin("e.office", "o");

        // Return the result.
        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesFindAll(DataTablesWrapper $dtWrapper) {

        // Create a query builder.
        $qb = $this->buildDataTablesFindAll($dtWrapper);
        $qb->leftJoin("e.office", "o")
            ->addSelect("o");

        // Return the result.
        return $qb->getQuery()->getResult();
    }

}
```

Modify the provider in the `src/AppBundle/Provider/EmployeeDataTablesProvider.php` file of your project like this:

```php
    /**
     * {@inheritdoc}
     */
    public function getColumns() {

        // Initialize the columns.
        $dtColumns = [];

        // ...

        $dtColumns[] = DataTablesColumn::newInstance("office", "Office")->getMapping()->setColumn("name")->setPrefix("o");

        // ...

        // Returns the columns.
        return $dtColumns;
    }

    // ...

    /**
     * {@inheritdoc}
     */
    public function renderColumn(DataTablesColumn $dtColumn, $entity) {

        // Initialize the output.
        $output = null;

        // Switch into column data.
        switch ($dtColumn->getData()) {

            // ...

            case "office":
                $output = $entity->getOffice()->getName();
                break;

            // ...

        }

        // Return the output.
        return $output;
    }

```

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
$ mkdir jquery-datatables-bundle
$ cd jquery-datatables-bundle
$ git clone git@github.com:webeweb/jquery-datatables-bundle.git .
$ composer install
```

Once all required libraries are installed then do:

```bash
$ vendor/bin/phpunit
```

---

## License

jquery-datatables-bundle is released under the LGPL License. See the bundled
[LICENSE](LICENSE) file for details.
