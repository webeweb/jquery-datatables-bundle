CHANGELOG
=========

### master

- Fix DataTables column method visibility
- Fix DataTables search with different data types (date, int, string, ...)
- Improve PHPDoc
- Optimize DataTables Twig extension 
- Replace deprecated Twig classes

### [2.1.1](https://github.com/webeweb/jquery-datatables-bundle/tree/v2.1.1) (2019-02-18)

- Remove all unnecessary Twig extension constructors

### [2.1.0](https://github.com/webeweb/jquery-datatables-bundle/tree/v2.1.0) (2019-02-14)

- Add wrapContent() into abstract DataTables provider
- Improve templates
- Improve unit tests
- Update DataTables to 1.10.18

### [2.0.4](https://github.com/webeweb/jquery-datatables-bundle/tree/v2.0.4) (2019-02-01)

- Add DataTables normalizer
- Clean up comments
- Fix PHPDoc
- Fix possible issue into DataTables wrapper helper
- Replace FileNotFoundException

### [2.0.3](https://github.com/webeweb/jquery-datatables-bundle/tree/v2.0.3) (2019-01-25)

- Add jQueryDataTablesName Twig function (retrieve a DataTables name with wrapper)
- Explode DataTables Twig extension unit tests
- Fix PHPDoc
- Fix event, service and tag names (snake case)

### [2.0.2](https://github.com/webeweb/jquery-datatables-bundle/tree/v2.0.2) (2019-01-18)

- Fix resource includes
- Improve functional tests

### [2.0.1](https://github.com/webeweb/jquery-datatables-bundle/tree/v2.0.1) (2019-01-18)

- Fix resource includes

### [2.0.0](https://github.com/webeweb/jquery-datatables-bundle/tree/v2.0.0) (2019-01-14)

- Add abstract DataTables provider
- Add CHANGELOG
- Add DataTables enumerator
- Add DataTables events
- Add DataTables factory
- Add DataTables manager trait
- Add DataTables mapping interface
- Add DataTables options interface
- Add DataTables request interface
- Add DataTables router interface
- Add DataTables Twig extension trait
- Add DataTables wrapper interface
- Add DataTables wrapper trait
- Add Symfony 4.2 support
- Add UserInterface injection into DataTables wrapper
- Improve code style
- Improve unit tests
- Remove getName() method into DataTables wrapper
- Remove keyword "final" into unit tests
- Split layout templates
- Update comments
- Update dependencies (Bootstrap bundle 2.0.0)
- Update TAG_NAME constant
- Update PHPDoc
- Use "interface" for parameter types

### [1.5.7](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.5.7) (2018-12-19)

- Fix Windows client support for CSV export

### [1.5.6](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.5.6) (2018-12-05)

- Fix invisible columns

### [1.5.5](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.5.5) (2018-10-08)

- Fix Doctrine query with a negative length (DataTables option bPaginate with false value)

### [1.5.4](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.5.4) (2018-10-04)

- Improve functional tests
- Update PHPDoc

### [1.5.3](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.5.3) (2018-10-01)

- Fix string delimiters

### [1.5.2](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.5.2) (2018-10-01)

- Update dependencies

### [1.5.1](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.5.1) (2018-09-28)

- Add compatibility with Symfony 4.x
- Improve unit tests
- Update dependencies (core-library 5.0.0)
- Update services configuration

### [1.5.0](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.5.0) (2018-09-25)

- Clean up code
- Improve unit tests
- Inject DataTables provider into DataTables wrapper
- Fix inheritance support by calling static methods with static:: in place of self::

### [1.4.1](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.4.1) (2018-09-12)

- Add "null" support into DataTables exceptions
- Add "null" support into DataTables editor
- Add "null" support into DataTables CSV exporter
- Add exceptions support
- Improve comments

### [1.4.0](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.4.0) (2018-09-10)

- Add column edition support
- Improve unit tests
- Update PHPDoc
- Update translations

### [1.3.0](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.3.0) (2018-09-06)

- Add constants
- Add language option support

### [1.2.1](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.2.1) (2018-08-30)

- Refactoring controller
- Update dependencies (core-library 4.2.0)

### [1.2.0](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.2.0) (2018-08-28)

- Improve coding style
- Rename "get" route into "show" route (break compatibility)

### [1.1.1](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.1.1) (2018-08-25)

- Add getCSVExporter()
- Update PHPDoc

### [1.1.0](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.1.0) (2018-08-24)

- Add DataTables options
- Add constants
- Add DataTables mapping helper
- Improve unit tests
- Update PHPDoc

### [1.0.3](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.0.3) (2018-08-22)

- Improve unit tests
- Update dependencies (core-library 4.0.0)

### [1.0.2](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.0.2) (2018-08-17)

- Fix Scrutinizer-CI issues
- Replace Response by JsonResponse

### [1.0.1](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.0.1) (2018-08-16)

- Fix exceptions arguments

### [1.0.0](https://github.com/webeweb/jquery-datatables-bundle/tree/v1.0.0) (2018-08-13)

- Initial release
