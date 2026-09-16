document-bundle
===============

[![Github actions workflow status](https://img.shields.io/github/actions/workflow/status/webeweb/jquery-datatables-bundle/build.yml?style=for-the-badge&color2088FF&logo=github)](https://github.com/webeweb/jquery-datatables-bundle/actions)
[![Coveralls](https://img.shields.io/coveralls/github/webeweb/jquery-datatables-bundle/master.svg?style=for-the-badge&color=3F5767&logo=coveralls)](https://coveralls.io/github/webeweb/jquery-datatables-bundle?branch=master)
[![Packagist version](https://img.shields.io/packagist/v/webeweb/jquery-datatables-bundle.svg?style=for-the-badge&color=F28D1A&logo=packagist)](https://packagist.org/packages/webeweb/jquery-datatables-bundle)
[![Packagist license](https://img.shields.io/packagist/l/webeweb/jquery-datatables-bundle.svg?style=for-the-badge&colorF28D1A&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHN0cm9rZT0iI0ZGRiIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIHN0cm9rZS13aWR0aD0iMiIgZD0ibTMgNiAzIDFtMCAwLTMgOWE1LjAwMiA1LjAwMiAwIDAgMCA2LjAwMSAwTTYgN2wzIDlNNiA3bDYtMm02IDIgMy0xbS0zIDEtMyA5YTUuMDAyIDUuMDAyIDAgMCAwIDYuMDAxIDBNMTggN2wzIDltLTMtOS02LTJtMC0ydjJtMCAxNlY1bTAgMTZIOW0zIDBoMyIvPjwvc3ZnPg==)](../../LICENSE)

An Electronic Document Management for Symfony 4 and more.

> IMPORTANT NOTICE: This package is still under development. Any changes will be
> done without prior notice to consumers of this package. Of course this code
> will become stable at a certain point, but for now, use at your own risk.

Includes:

- [Dropzone 5.9.3](http://www.dropzonejs.com/)

If you like this package, pay me a beer (or a coffee)
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-003087.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)

## Compatibility

[![PHP](https://img.shields.io/packagist/php-v/webeweb/jquery-datatables-bundle.svg?style=for-the-badge&color=777BB4&logo=php)](http://php.net)
[![Symfony](https://img.shields.io/badge/dynamic/json?url=https%3A%2F%2Fraw.githubusercontent.com%2Fwebeweb%2Fjquery-datatables-bundle%2Fmaster%2Fcomposer.json&query=%24%5B'require'%5D%5B'symfony%2Fframework-bundle'%5D&style=for-the-badge&color=000000&logo=symfony&label=symfony)](http://php.net)

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
composer require webeweb/edm-bundle
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
            new WBW\Bundle\DocumentBundle\WBWDocumentBundle(),
        ];

        return $bundles;
    }
```

## Usage

Read the [documentation](Resources/doc/index.md).

The following commands are available:

```bash
php bin/console wbw:document:provider:list
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
vendor/bin/phpunit
```

## License

`document-bundle` is released under the MIT License. See the bundled
[LICENSE](../../LICENSE) file for details.

## Donate

If you like this work, please consider donating at
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-003087.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)
