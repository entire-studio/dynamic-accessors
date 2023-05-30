<?php

declare(strict_types=1);

use Gormack\DynamicAccessors\DynamicAccessors;
use Gormack\DynamicAccessors\Get;
use Gormack\DynamicAccessors\Set;

require_once __DIR__ . '/vendor/autoload.php';

class Example
{
    use DynamicAccessors;

    #[Set, Get]
    private string $firstName;

    #[Set('lastName'), Set('setLastName'), Get('getLastName')]
    private string $lastName;

    public function sayHello(): string {
        return sprintf(
            "Hello, I'm %s %s." . PHP_EOL,
            $this->firstName,
            $this->lastName,
        );
    }
}

$entity = new Example();
$entity->firstName("Clark");
$entity->lastName("Kent");
echo $entity->sayHello();

$entity->setLastName("Brzęczyszczykiewicz");
echo $entity->sayHello();
