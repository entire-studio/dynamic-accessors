<?php

declare(strict_types=1);

use Gormack\DynamicAccessors\{
    DynamicAccessors,
    Get,
    Set
};

require_once __DIR__ . '/vendor/autoload.php';

/**
 * You can annotate your class for IDE completion
 * @method void setLastName(string $name)
 * @method string getLastName()
 */
class Example
{
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
