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

## Examples

### Basic - accessors on class properties
```php
<?php

declare(strict_types=1);

use EntireStudio\DynamicAccessors\{
    DynamicAccessors,
    Get,
    Set
};

/**
 * You can annotate your class for IDE completion
 *
 * @method string|void firstName(?string $argument = '')
 * @method void setLastName(string $name)
 * @method string getLastName()
 */
class Basic
{
    use DynamicAccessors;

    #[Set, Get]
    private string $firstName;

    #[Set('setLastName'), Get('getLastName')]
    private string $lastName;
}

$basic = new Basic();
$basic->firstName('Clark');
$basic->setLastName('Kent');

printf(
    'My name is %s %s.' . PHP_EOL,
    $basic->firstName(),
    $basic->getLastName(),
);
```
```bash
$ php example/Basic.php
```
### Constructor - accessors on constructor parameters
```php
<?php

declare(strict_types=1);

use EntireStudio\DynamicAccessors\{
    DynamicAccessors,
    Get,
    Set
};

/**
 * You can annotate your class for IDE completion
 *
 * @method string|void firstName(?string $argument = '')
 * @method void setLastName(string $name)
 * @method string getLastName()
 */
class ConstructorPropertyPromotion
{
    use DynamicAccessors;

    public function __construct(
        #[Set, Get]
        private string $firstName,
        #[Set('setLastName'), Get('getLastName')]
        private string $lastName,
    ) {
    }
}

$cpp = new ConstructorPropertyPromotion(
    'Lois',
    'Lane'
);

printf(
    'My name is %s %s.' . PHP_EOL,
    $cpp->firstName(),
    $cpp->getLastName(),
);
```
```bash
$ php example/ConstructorPropertyPromotion.php
```

## Commands

### Development
- `composer test` - runs test suite.
- `composer sat` - runs static analysis.
- `composer style` - checks codebase against PSR-12 coding style.
- `composer style:fix` - fixes basic coding style issues.
