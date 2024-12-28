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
