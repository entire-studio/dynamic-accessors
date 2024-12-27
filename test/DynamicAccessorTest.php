<?php

declare(strict_types=1);

namespace EntireStudio\DynamicAccessors\Test;

use EntireStudio\DynamicAccessors\{DynamicAccessors, Get, Set};
use PHPUnit\Framework\TestCase;

class DynamicAccessorTest extends TestCase
{
    public function testTrait(): void
    {
        $cut = new class
        {
            use DynamicAccessors;

            #[Set, Get] // The same as #[Set('firstName), Get('firstName)]
            protected string $firstName = 'John';

            #[Set('setLastName'), Get('getLastName')] // rename accessors
            private $lastName = 'Doe';
        };

        $this->assertEquals('John', $cut->firstName());
        $cut->firstName('NOT John');
        $this->assertEquals('NOT John', $cut->firstName());

        $this->assertEquals('Doe', $cut->getLastName());
        $cut->setLastName('NOT Doe');
        $this->assertEquals('NOT Doe', $cut->getLastName());
    }
}
