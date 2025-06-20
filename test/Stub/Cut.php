<?php

declare(strict_types=1);

namespace EntireStudio\DynamicAccessors\Test\Stub;

use EntireStudio\DynamicAccessors\DynamicAccessors;
use EntireStudio\DynamicAccessors\Get;
use EntireStudio\DynamicAccessors\Set;

/**
 * @method string|void firstName(?string $argument = '')
 * @method void setLastName(string $name)
 * @method string getLastName()
 */
class Cut
{
    use DynamicAccessors;

    #[Set, Get]
    protected string $firstName = 'John';

    #[Set('setLastName'), Get('getLastName')]
    private string $lastName = 'Doe';
}
