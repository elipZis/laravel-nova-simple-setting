# Laravel Nova Resource for a simple key/value typed setting

[![Latest Version on Packagist](https://img.shields.io/packagist/v/elipzis/laravel-nova-simple-setting.svg?style=flat-square)](https://packagist.org/packages/elipzis/laravel-nova-simple-setting)
[![Total Downloads](https://img.shields.io/packagist/dt/elipzis/laravel-nova-simple-setting.svg?style=flat-square)](https://packagist.org/packages/elipzis/laravel-nova-simple-setting)

Administer your [Laravel Simple Setting](https://github.com/elipZis/laravel-simple-setting)
in [Nova](https://nova.laravel.com/)

## Pre-requisites

This Nova resource package requires:

* [Laravel Simple Setting](https://github.com/elipZis/laravel-simple-setting)
* [Laravel Nova 4](https://nova.laravel.com/)
* [Nova 4 dependency container](https://github.com/alexwenzel/nova-dependency-container)

## Installation

You can install the package via composer:

```bash
composer require elipzis/laravel-nova-simple-setting
```

## Usage

To add this resource to your Nova open the `NovaServiceProvider.php` and add it, e.g.

```php
<?php
...
use ElipZis\Setting\Nova\Setting;
...

    protected function resources()
    {
        parent::resources();

        ...

        Nova::resources([
            Setting::class
        ]);
    }
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Credits

- [elipZis GmbH](https://elipZis.com)
- [NeA](https://github.com/nea)
- [All Contributors](https://github.com/elipZis/laravel-nova-simple-setting/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
