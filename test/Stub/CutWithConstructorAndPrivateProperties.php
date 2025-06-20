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
class CutWithConstructorAndPrivateProperties
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
