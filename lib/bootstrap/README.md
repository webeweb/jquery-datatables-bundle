bootstrap-bundle
================

[![Github actions workflow status](https://img.shields.io/github/actions/workflow/status/webeweb/jquery-datatables-bundle/build.yml?style=for-the-badge&color2088FF&logo=github)](https://github.com/webeweb/jquery-datatables-bundle/actions)
[![Coveralls](https://img.shields.io/coveralls/github/webeweb/jquery-datatables-bundle/master.svg?style=for-the-badge&color=3F5767&logo=coveralls)](https://coveralls.io/github/webeweb/jquery-datatables-bundle?branch=master)
[![Packagist version](https://img.shields.io/packagist/v/webeweb/jquery-datatables-bundle.svg?style=for-the-badge&color=F28D1A&logo=packagist)](https://packagist.org/packages/webeweb/jquery-datatables-bundle)
[![Packagist license](https://img.shields.io/packagist/l/webeweb/jquery-datatables-bundle.svg?style=for-the-badge&colorF28D1A&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHN0cm9rZT0iI0ZGRiIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIHN0cm9rZS13aWR0aD0iMiIgZD0ibTMgNiAzIDFtMCAwLTMgOWE1LjAwMiA1LjAwMiAwIDAgMCA2LjAwMSAwTTYgN2wzIDlNNiA3bDYtMm02IDIgMy0xbS0zIDEtMyA5YTUuMDAyIDUuMDAyIDAgMCAwIDYuMDAxIDBNMTggN2wzIDltLTMtOS02LTJtMC0ydjJtMCAxNlY1bTAgMTZIOW0zIDBoMyIvPjwvc3ZnPg==)](../../LICENSE)

Integrate Bootstrap theme with Symfony 4 and more.

`bootstrap-bundle` eases the use of Bootstrap to display components in your
Symfony application by providing Twig extensions and PHP objects to do the heavy
lifting. The bundle include the excellent framework [Bootstrap](https://getbootstrap.com/)
and some useful plugins.

<img src="https://raw.githubusercontent.com/webeweb/jquery-datatables-bundle/master/lib/bootstrap/Resources/doc/readme_900x900.png" alt="Bootstrap bundle" align="right" width="416"/>

Includes:

- [Bootstrap 3.4.1](https://getbootstrap.com/docs/3.4)
- [Bootstrap 4.6.2](https://getbootstrap.com/docs/4.6)
- [Bootstrap 5.3.0](https://getbootstrap.com/docs/5.3)
- [Bootstrap Colorpicker 2.5.3](https://github.com/itsjavi/bootstrap-colorpicker) (Bootstrap plug-in)
- [Bootstrap Datepicker 1.9.0](https://github.com/uxsolutions/bootstrap-datepicker) (Bootstrap plug-in)
- [Bootstrap Daterangepicker 2.1.27](https://github.com/dangrossman/daterangepicker) (Bootstrap plug-in)
- [Bootstrap Icons 1.9.1](https://icons.getbootstrap.com)
- [Bootstrap Markdown 2.10.0](https://github.com/toopay/bootstrap-markdown) (Bootstrap plug-in)
- [Bootstrap Notify 3.1.3](https://github.com/mouse0270/bootstrap-growl) (Bootstrap plug-in)
- [Bootstrap Select 1.12.4](https://github.com/silviomoreto/bootstrap-select) (Bootstrap plug-in)
- [Bootstrap Slider 10.0.0](https://github.com/seiyria/bootstrap-slider) (Bootstrap plug-in)
- [Bootstrap Social 5.1.1](https://github.com/lipis/bootstrap-social) (Bootstrap plug-in)
- [Bootstrap Tagsinput 0.8.0](https://github.com/bootstrap-tagsinput/bootstrap-tagsinput) (Bootstrap plug-in)
- [Bootstrap Timepicker 0.5.2](https://github.com/jdewit/bootstrap-timepicker) (Bootstrap plug-in)
- [Bootstrap WYSIWYG 0.3.3](https://github.com/Waxolunist/bootstrap3-wysihtml5-bower) (Bootstrap plug-in)
- [Font Awesome 5.15.2](https://github.com/FortAwesome/Font-Awesome)
- [Handlebars 1.3.0](https://github.com/handlebars-lang/handlebars.js) (Bootstrap WYSIWYG dependency)
- [Material Design Iconic Font 2.2.0](https://github.com/zavoloklom/material-design-iconic-font)
- [Meteocons](https://www.alessioatzeni.com/meteocons)
- [Moment.js 2.20.1](https://github.com/moment/moment) (Bootstrap Daterangepicker dependency)
- [Popper.js 1.15.0](https://github.com/popperjs/popper-core) (Bootstrap dependency)
- [Summernote 0.8.20](https://github.com/summernote/summernote) (Bootstrap plug-in)
- [twemoji 14.0.2](https://github.com/twitter/twemoji)
- [WYSIHTML 0.4.15](https://github.com/Voog/wysihtml) (Bootstrap WYSIWYG dependency)

Provides:

- Alert Twig extension
- Badge Twig extension
- Button Twig extension
- Label Twig extension
- Progress bar Twig extension
- Grid Twig extension (only for Bootstrap 3)
- Code Twig extension
- Typography Twig extension
- Bootstrap icon Twig extension
- Font Awesome Twig extension
- Glyphicon Twig extension
- Material Design Iconic font Twig extension
- Meteocons Twig extension
- Tabler icon Twig extension

If you like this package, pay me a beer (or a coffee)
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-0070ba.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)

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
            new WBW\Bundle\BootstrapBundle\WBWBootstrapBundle(),
        ];

        // ...

        return $bundles;
    }
```

Once the bundle is added then do:

```bash
php bin/console wbw:common:assets:unzip
php bin/console assets:install
```

## Usage

Read the [documentation](Resources/doc/index.md).

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
vendor/bin/phpunit lib/bootstrap/Tests
```

## License

`bootstrap-bundle` is released under the MIT License. See the bundled [LICENSE](../../LICENSE)
file for details.

## Donate

If you like this work, please consider donating at
[![paypal.me](https://img.shields.io/badge/paypal.me-webeweb-0070ba.svg?style=flat-square&logo=paypal)](https://www.paypal.me/webeweb)
