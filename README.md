# Dynamic Accessors

![Packagist Version (including pre-releases)](https://img.shields.io/packagist/v/entire-studio/dynamic-accessors?include_prereleases)
![GitHub release (latest SemVer including pre-releases)](https://img.shields.io/github/v/release/entire-studio/dynamic-accessors?include_prereleases&sort=semver)
[![CI](https://github.com/entire-studio/dynamic-accessors/actions/workflows/ci.yml/badge.svg)](https://github.com/entire-studio/dynamic-accessors/actions/workflows/ci.yml)
[![codecov](https://codecov.io/github/entire-studio/dynamic-accessors/branch/master/graph/badge.svg?token=BLCJ4WV25D)](https://codecov.io/github/entire-studio/dynamic-accessors)

Dynamic setters and getters. While it can be done, it doesn't mean you should do it.

## Installation
Install the latest version with
```bash
$ composer require entire-studio/dynamic-accessors
```

## Basic Usage
```php
<?php

use EntireStudio\DynamicAccessors\{
    DynamicAccessors,
    Get,
    Set
};

/**
 * You can annotate your class for IDE completion
 * @method void setLastName(string $name)
 * @method string getLastName()
 */
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

### Development
- `composer test` - runs test suite.
- `composer sat` - runs static analysis.
- `composer style` - checks codebase against PSR-12 coding style.
- `composer style:fix` - fixes basic coding style issues.
