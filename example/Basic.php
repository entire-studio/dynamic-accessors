<?php

declare(strict_types=1);

namespace EntireStudio\DynamicAccessors\Example;

use EntireStudio\DynamicAccessors\{
    DynamicAccessors,
    Get,
    Set
};

require_once dirname(__DIR__) . '/vendor/autoload.php';

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
