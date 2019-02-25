DOCUMENTATION
=============

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
use DateTime;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesColumnInterface;
use WBW\Bundle\JQuery\DataTablesBundle\API\DataTablesResponseInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Factory\DataTablesFactory;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesCSVExporterInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesEditorInterface;
use WBW\Bundle\JQuery\DataTablesBundle\Provider\DataTablesProviderInterface;

/**
 * Employee DataTables provider.
 */
class EmployeeDataTablesProvider implements DataTablesProviderInterface, DataTablesCSVExporterInterface, DataTablesEditorInterface {

    /**
     * {@inheritdoc}
     */
    public function editColumn(DataTablesColumnInterface $dtColumn, $entity, $value) {

        // Switch into column data.
        switch ($dtColumn->getData()) {

            case "age":
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
    public function getOptions() {
        return null;

        // Custom options with the following code :
        // $dtOptions = DataTablesFactory::newOptions();
        // $dtOptions->addOption("language", ["url" => DataTablesWrapperHelper::getLanguageURL("French")]);
        // $dtOptions->addOption("responsive", true);
        // $dtOptions->addOption("searchDelay", 1000);
        // return $dtOptions;
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

        // Custom template can be use with the following code :
        // return "@App/Employee/index.html.twig";
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
```

Add this provider in the `app/config/services.yml` file of your project:

```yaml
services:
    # ...
    app.datatables.provider.employee:
        class: AppBundle\Provider\EmployeeDataTablesProvider
        tags:
            - { name: "webeweb.jquery_datatables.provider" }
```

You can add as many providers as you want as long as the name of the providers are different.

### 4) Template (for custom rendering)

Create a template in the `src/AppBundle/Resources/views/Employee`directory of your project:

```html
{# src/AppBundle/Resources/views/Employee/index.html.twig #}

{% block stylesheets %}
    {{ parent() }}
    {% include "@JQueryDataTables/layout/stylesheets.html.twig" with {"theme": "bootstrap" } %}
{% endblock %}

{% block content %}
    {{ renderDataTables(dtWrapper) }}
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    {% include "@JQueryDataTables/layout/javascripts.html.twig" with {"theme": "bootstrap" } %}
    {{ jQueryDataTables(dtWrapper) }}
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
    public function dataTablesCountFiltered(DataTablesWrapperInterface $dtWrapper) {

        // Create a query builder.
        $qb = $this->buildDataTablesCountFiltered($dtWrapper);
        $qb->leftJoin("e.office", "o");

        // Return the result.
        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesCountTotal(DataTablesWrapperInterface $dtWrapper) {

        // Create a query builder.
        $qb = $this->buildDataTablesCountTotal($dtWrapper);
        $qb->leftJoin("e.office", "o");

        // Return the result.
        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * {@inheritdoc}
     */
    public function dataTablesFindAll(DataTablesWrapperInterface $dtWrapper) {

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

        $dtColumns[2]->getMapping()
            ->setColumn("name")
            ->setPrefix("o");

        // Returns the columns.
        return $dtColumns;
    }

    // ...

    /**
     * {@inheritdoc}
     */
    public function renderColumn(DataTablesColumnInterface $dtColumn, $entity) {

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
