datatables-bundle
=================

[![Github actions workflow status](https://img.shields.io/github/actions/workflow/status/webeweb/jquery-datatables-bundle/build.yml?style=for-the-badge&color2088FF&logo=github)](https://github.com/webeweb/jquery-datatables-bundle/actions)
[![Coveralls](https://img.shields.io/coveralls/github/webeweb/jquery-datatables-bundle/master.svg?style=for-the-badge&color=3F5767&logo=coveralls)](https://coveralls.io/github/webeweb/jquery-datatables-bundle?branch=master)
[![Packagist version](https://img.shields.io/packagist/v/webeweb/jquery-datatables-bundle.svg?style=for-the-badge&color=F28D1A&logo=packagist)](https://packagist.org/packages/webeweb/jquery-datatables-bundle)
[![Packagist license](https://img.shields.io/packagist/l/webeweb/jquery-datatables-bundle.svg?style=for-the-badge&colorF28D1A&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHN0cm9rZT0iI0ZGRiIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIHN0cm9rZS13aWR0aD0iMiIgZD0ibTMgNiAzIDFtMCAwLTMgOWE1LjAwMiA1LjAwMiAwIDAgMCA2LjAwMSAwTTYgN2wzIDlNNiA3bDYtMm02IDIgMy0xbS0zIDEtMyA5YTUuMDAyIDUuMDAyIDAgMCAwIDYuMDAxIDBNMTggN2wzIDltLTMtOS02LTJtMC0ydjJtMCAxNlY1bTAgMTZIOW0zIDBoMyIvPjwvc3ZnPg==)](./LICENSE)

Integrate DataTables with Symfony 4 and more.

`jquery-datatables-bundle` eases the use of **DataTables** to display rich
data tables in your Symfony application by providing Twig extensions and PHP
objects to do the heavy lifting. The bundle include the excellent JS library
[DataTables](https://datatables.net/) and this plug-ins.

Dry out your DataTables code by writing it all in PHP !

<img src="https://raw.githubusercontent.com/webeweb/jquery-datatables-bundle/master/doc/readme_380x550.png" alt="DataTables bundle" align="right" height="456"/>

Includes:

- [DataTables 1.13.8](https://datatables.net/)
- [DataTables AutoFill 2.6.0](https://datatables.net/extensions/autofill/) (DataTables plugin)
- [DataTables Buttons 2.4.2](https://datatables.net/extensions/buttons/) (DataTables plugin)
- DataTables JSZip 3.10.1
- DataTables pdfmake 0.2.7
- [DataTables ColReorder 1.7.0](https://datatables.net/extensions/colreorder/) (DataTables plugin)
- [DataTables DateTime 1.5.1](https://datatables.net/extensions/datetime/) (DataTables plugin)
- [DataTables FixedColumns 4.3.0](https://datatables.net/extensions/fixedcolumns/) (DataTables plugin)
- [DataTables FixedHeader 3.4.0](https://datatables.net/extensions/fixedheader/) (DataTables plugin)
- [DataTables KeyTable 2.11.0](https://datatables.net/extensions/keytable/) (DataTables plugin)
- [DataTables Responsive 2.5.0](https://datatables.net/extensions/responsive/) (DataTables plugin)
- [DataTables RowGroup 1.4.1](https://datatables.net/extensions/rowgroup/) (DataTables plugin)
- [DataTables RowReorder 1.4.1](https://datatables.net/extensions/rowreorder/) (DataTables plugin)
- [DataTables Scroller 2.3.0](https://datatables.net/extensions/scroller/) (DataTables plugin)
- [DataTables SearchBuilder 1.6.0](https://datatables.net/extensions/searchbuilder/) (DataTables plugin)
- [DataTables SearchPanes 2.2.0](https://datatables.net/extensions/searchpanes/) (DataTables plugin)
- [DataTables Select 1.7.0](https://datatables.net/extensions/select/) (DataTables plugin)
- [DataTables StateRestore 1.3.0](https://datatables.net/extensions/staterestore/) (DataTables plugin)
- [editableTable](https://github.com/mindmup/editable-table/)

Provides:

- a "wbw_datatables_delete" route to delete a managed entity by a DataTable
- a "wbw_datatables_edit" route to edit all columns provided by a DataTable
- a "wbw_datatables_export" route to export all managed entities by a DataTable
- a "wbw_datatables_index" route to display a DataTable (main and columns searches is also provide with a generic implementation)
- a "wbw_datatables_options" route to retrieve with an XML HTTP request the options of a DataTable
- a "wbw_datatables_render" route to retrieve with an XML HTTP request the HTML rendering of a DataTable
- a "wbw_datatables_serialize" route to retrieve with an XML HTTP request a managed entity by a DataTable into JSON format

If you like this package, pay me a beer (or a coffee)
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-003087.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)

## Compatibility

[![PHP](https://img.shields.io/packagist/php-v/webeweb/jquery-datatables-bundle.svg?style=for-the-badge&color=777BB4&logo=php)](http://php.net)
[![Symfony](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2Fwebeweb%2Fjquery-datatables-bundle%2Fmaster%2Fcomposer.json&query=%24%5B'require'%5D%5B'symfony%2Fframework-bundle'%5D&style=for-the-badge&color=000000&logo=symfony&label=symfony)](http://php.net)

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
composer require webeweb/jquery-datatables-bundle
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
            new WBW\Bundle\CoreBundle\WBWCoreBundle(),
            new WBW\Bundle\BootstrapBundle\WBWBootstrapBundle(),
            new WBW\Bundle\DataTablesBundle\WBWDataTablesBundle(),
        ];

        // ...

        return $bundles;
    }
```

Once the bundle is added then do:

```bash
php bin/console wbw:core:unzip-assets
php bin/console assets:install
```

Add the bundle assets in the `app/config/config.yml` file of your project:

```yaml
# ...
# Core configuration
wbw_core:
    plugins:
        - "jquery"

# Bootstrap configuration
wbw_bootstrap:
    version: 3

# DataTables configuration
wbw_datatables:
    theme: "bootstrap"
    plugins:
        - "responsive"
```

> IMPORTANT NOTICE: For use with Bootstrap 4 or 5, replace '3' by version number
> into wbw_bootstrap.version and append the version number at 'bootstrap' into
> wbw_datatables theme.

Add the bundle routing in the `app/config/routing.yml` file of your project:

```yaml
# ...
wbw_datatables:
    prefix:   "/"
    resource: "@WBWDataTablesBundle/Resources/config/routing.yml"
```

## Usage

Read the [documentation](doc/index.md).

The following commands are available:

```bash
php bin/console wbw:datatables:provider:list
```

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
git clone https://github.com/webeweb/jquery-datatables-bundle.git
cd jquery-datatables-bundle
composer install
```

Once all required libraries are installed then do:

```bash
php vendor/bin/phpunit
```

## License

`jquery-datatables-bundle` is released under the MIT License. See the bundled
[LICENSE](LICENSE) file for details.

## Donate

If you like this work, please consider donating at
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-003087.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)
