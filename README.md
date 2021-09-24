jquery-datatables-bundle
========================

[![Build Status](https://img.shields.io/github/workflow/status/webeweb/jquery-datatables-bundle/build?style=flat-square)](https://github.com/webeweb/jquery-datatables-bundle/actions)
[![Coverage Status](https://img.shields.io/coveralls/github/webeweb/jquery-datatables-bundle/master.svg?style=flat-square)](https://coveralls.io/github/webeweb/jquery-datatables-bundle?branch=master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/quality/g/webeweb/jquery-datatables-bundle/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/webeweb/jquery-datatables-bundle/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/webeweb/jquery-datatables-bundle.svg?style=flat-square)](https://packagist.org/packages/webeweb/jquery-datatables-bundle)
[![Latest Unstable Version](https://img.shields.io/packagist/vpre/webeweb/jquery-datatables-bundle.svg?style=flat-square)](https://packagist.org/packages/webeweb/jquery-datatables-bundle)
[![License](https://img.shields.io/packagist/l/webeweb/jquery-datatables-bundle.svg?style=flat-square)](https://packagist.org/packages/webeweb/jquery-datatables-bundle)
[![composer.lock](https://img.shields.io/badge/.lock-uncommited-important.svg?style=flat-square)](https://packagist.org/packages/webeweb/jquery-datatables-bundle)

Integrate jQuery DataTables with Symfony 2 and more.

`jquery-datatables-bundle` eases the use of jQuery DataTables to display rich
DataTables in your Symfony application by providing Twig extensions and PHP
objects to do the heavy lifting. The bundle include the excellent JS library
[jQuery DataTables](https://datatables.net/) and this plug-ins.

Dry out your DataTables code by writing it all in PHP !

<img src="https://raw.githubusercontent.com/webeweb/jquery-datatables-bundle/master/Resources/doc/screenshot_readme.png" alt="jQuery DataTables bundle" align="right" height="456"/>

Includes :

- [DataTables 1.10.25](https://datatables.net/)
- [DataTables AutoFill 2.3.7](https://datatables.net/extensions/autofill/) (DataTables plugin)
- [DataTables Buttons 1.7.1](https://datatables.net/extensions/buttons/) (DataTables plugin)
- DataTables JSZip 2.5.0
- DataTables pdfmake 0.1.36
- [DataTables ColReorder 1.5.4](https://datatables.net/extensions/colreorder/) (DataTables plugin)
- [DataTables DateTime 1.1.0](https://datatables.net/extensions/datetime/) (DataTables plugin)
- [DataTables FixedColumns 3.3.3](https://datatables.net/extensions/fixedcolumns/) (DataTables plugin)
- [DataTables FixedHeader 3.1.9](https://datatables.net/extensions/fixedheader/) (DataTables plugin)
- [DataTables KeyTable 2.6.2](https://datatables.net/extensions/keytable/) (DataTables plugin)
- [DataTables Responsive 2.2.9](https://datatables.net/extensions/responsive/) (DataTables plugin)
- [DataTables RowGroup 1.1.3](https://datatables.net/extensions/rowgroup/) (DataTables plugin)
- [DataTables RowReorder 1.2.8](https://datatables.net/extensions/rowreorder/) (DataTables plugin)
- [DataTables Scroller 2.0.4](https://datatables.net/extensions/scroller/) (DataTables plugin)
- [DataTables SearchBuilder 1.1.0](https://datatables.net/extensions/searchbuilder/) (DataTables plugin)
- [DataTables SearchPanes 1.3.0](https://datatables.net/extensions/searchpanes/) (DataTables plugin)
- [DataTables Select 1.3.3](https://datatables.net/extensions/select/) (DataTables plugin)
- [editableTable](https://github.com/mindmup/editable-table/)

Provides :

- a "wbw_jquery_datatables_delete" route to delete a managed entity by a DataTable
- a "wbw_jquery_datatables_edit" route to edit all columns provided by a DataTable
- a "wbw_jquery_datatables_export" route to export all managed entities by a DataTable
- a "wbw_jquery_datatables_index" route to display a DataTable (main and columns searches is also provide with a generic implementation)
- a "wbw_jquery_datatables_options" route to retrieve with an XML HTTP request the options of a DataTable
- a "wbw_jquery_datatables_render" route to retrieve with an XML HTTP request the HTML rendering of a DataTable
- a "wbw_jquery_datatables_serialize" route to retrieve with an XML HTTP request a managed entity by a DataTable into JSON format

If you like this package, pay me a beer (or a coffee)
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-0070ba.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)

## Compatibility

[![PHP](https://img.shields.io/packagist/php-v/webeweb/jquery-datatables-bundle.svg?style=flat-square)](http://php.net)
[![Symfony](https://img.shields.io/badge/symfony-%5E3.4%7C%5E4.0-brightness.svg?style=flat-square)](https://symfony.com)

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
$ composer require webeweb/jquery-datatables-bundle
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
            new WBW\Bundle\JQuery\DataTablesBundle\WBWJQueryDataTablesBundle(),
        ];

        // ...

        return $bundles;
    }
```

Once the bundle is added then do:

```bash
$ php bin/console wbw:core:unzip-assets
$ php bin/console assets:install
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

# jQuery DataTables configuration
wbw_jquery_datatables:
    theme: "bootstrap"
    plugins:
        - "responsive"
```

> IMPORTANT NOTICE: For use with Bootstrap 4, replace '3' by '4' into wbw_bootstrap.version and 
> 'bootstrap' by 'bootstrap4' into wbw_jquery_datatables theme.

Add the bundle routing in the `app/config/routing.yml` file of your project:

```yaml
# ...
wbw_jquery_datatables:
    prefix:   "/"
    resource: "@WBWJQueryDataTablesBundle/Resources/config/routing.yml"
```

## Usage

Read the [documentation](Resources/doc/index.md).

The following commands are available:
```bash
$ php bin/console wbw:jquery:datatables:list-provider
```

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
$ git clone https://github.com/webeweb/jquery-datatables-bundle.git
$ cd jquery-datatables-bundle
$ composer install
```

Once all required libraries are installed then do:

```bash
$ vendor/bin/phpunit
```

## License

`jquery-datatables-bundle` is released under the MIT License. See the bundled
[LICENSE](LICENSE) file for details.

## Donate

If you like this work, please consider donating at
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-0070ba.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)
