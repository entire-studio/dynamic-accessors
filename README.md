# Dynamic Accessors

![Packagist Version (including pre-releases)](https://img.shields.io/packagist/v/gormack/dynamic-accessors?include_prereleases)
![GitHub release (latest SemVer including pre-releases)](https://img.shields.io/github/v/release/gormack/dynamic-accessors?include_prereleases&sort=semver)
[![CI](https://github.com/gormack/dynamic-accessors/actions/workflows/ci.yml/badge.svg)](https://github.com/gormack/dynamic-accessors/actions/workflows/ci.yml)
[![codecov](https://codecov.io/github/gormack/dynamic-accessors/branch/master/graph/badge.svg?token=BLCJ4WV25D)](https://codecov.io/github/gormack/dynamic-accessors)

Dynamic setters and getters. While it can be done, it doesn't mean you should do it.

## Installation
Install the latest version with
```bash
$ composer require gormack/dynamic-accessors
```

## Basic Usage
```php
<?php

use Gormack\DynamicAccessors\{
    DynamicAccessors,
    Get,
    Set
};

class Example {
    use DynamicAccessors;

    #[Set, Get] // Register default accessors
    private string $firstName;

    #[Set('setLastName'), Get('getLastName')] // Register under different name
    private string $lastName;
}

$e = new Example();
$e->firstName('Clark');
$e->setLastName('Kent');

printf(
    'My name is %s %s.' . PHP_EOL,
    $e->firstName(),  // getter and setter have the same name
    $e->getLastName() // getter is custom and different from setter
);
```
```bash
$ php example.php
```
## Commands

- `composer lint` - run linter.
- `composer lint:fix` - fix some issues detected by linter automatically (easy ones).
- `composer test` - run tests.
