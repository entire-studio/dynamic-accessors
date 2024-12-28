<?php

declare(strict_types=1);

namespace EntireStudio\DynamicAccessors\Test;

use EntireStudio\DynamicAccessors\{DynamicAccessors, Get, Set};
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class DynamicAccessorTest extends TestCase
{
    private string $firstName = 'John';
    private string $lastName = 'Doe';

    #[TestDox('Accessors declared on properties')]
    public function testAccessorsOnProperties(): void
    {
        $cut = new class
        {
            use DynamicAccessors;

            #[Set, Get]
            protected string $firstName = 'John';

            #[Set('setLastName'), Get('getLastName')]
            private string $lastName = 'Doe';
        };

        $this->assertEquals($this->firstName, $cut->firstName());
        $cut->firstName('NOT ' . $this->firstName);
        $this->assertEquals('NOT ' . $this->firstName, $cut->firstName());

        $this->assertEquals($this->lastName, $cut->getLastName());
        $cut->setLastName('NOT ' . $this->lastName);
        $this->assertEquals('NOT ' . $this->lastName, $cut->getLastName());
    }

    #[TestDox('Accessors declared on constructor arguments')]
    public function testAccessorsOnConstructorArguments(): void
    {
        $cut = new class ($this->firstName, $this->lastName)
        {
            use DynamicAccessors;

            public function __construct(
                #[Set, Get]
                private string $firstName,
                #[Set('setLastName'), Get('getLastName')]
                private string $lastName,
            ) {
            }
        };

        $this->assertEquals($this->firstName, $cut->firstName());
        $cut->firstName('NOT ' . $this->firstName);
        $this->assertEquals('NOT ' . $this->firstName, $cut->firstName());

        $this->assertEquals($this->lastName, $cut->getLastName());
        $cut->setLastName('NOT ' . $this->lastName);
        $this->assertEquals('NOT ' . $this->lastName, $cut->getLastName());
    }
}
