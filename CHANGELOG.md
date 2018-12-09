CHANGELOG
=========

### master

- Update TAG_NAME constant
- Add Symfony 4.2 support
- Add CHANGELOG
- Remove keyword "final" into unit tests
- Remove getName() method into DataTables wrapper
- Use "interface" for parameter types
- Update comments
- Add a DataTables enumerator
- Add a DataTables wrapper trait
- Add a DataTables wrapper interface
- Add a DataTables factory
- Update PHPDoc
- Add a DataTables options interface
- Add a DataTables request interface
- Add a DataTables mapping interface

### 1.5.5 (2018-10-08)

- Fix Doctrine query with a negative length (DataTables option bPaginate with false value)

### 1.5.4 (2018-10-04)

- Update PHPDoc
- Improve functional tests

### 1.5.3 (2018-10-01)

- Fix string delimiters

### 1.5.2 (2018-10-01)

- Update dependencies

### 1.5.1 (2018-09-28)

- Improve unit tests
- Add compatibility with Symfony 4.x
- Update dependencies (core-library 5.0.0)
- Update services configuration

### 1.5.0 (2018-09-25)

- Inject DataTables provider into DataTables wrapper
- Clean up code
- Improve unit tests
- Fix inheritance support by calling static methods with static:: in place of self::

### 1.4.1 (2018-09-12)

- Add "null" support into DataTables exceptions
- Add "null" support into DataTables editor
- Add "null" support into DataTables CSV exporter
- Add exceptions support
- Improve comments

### 1.4.0 (2018-09-10)

- Update PHPDoc
- Improve unit tests
- Update translations
- Add column edition support

### 1.3.0 (2018-09-06)

- Add language option support
- Add constants

### 1.2.1 (2018-08-30)

- Update dependencies (core-library 4.2.0)
- Refactoring controller

### 1.2.0 (2018-08-28)

- Rename "get" route into "show" route (break compatibility)
- Improve coding style

### 1.1.1 (2018-08-25)

- Update PHPDoc
- Add getCSVExporter()

### 1.1.0 (2018-08-24)

- Improve unit tests
- Add a DataTables options
- Add constants
- Add a DataTables mapping helper
- Update PHPDoc

### 1.0.3 (2018-08-22)

- Update dependencies (core-library 4.0.0)
- Improve unit tests

### 1.0.2 (2018-08-17)

- Fix Scrutinizer-CI issues
- Replace Response by JsonResponse

### 1.0.1 (2018-08-16)

- Fix exceptions arguments

### 1.0.0 (2018-08-13)

- Initial release
