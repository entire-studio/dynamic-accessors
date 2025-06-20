<?php

declare(strict_types=1);

namespace EntireStudio\DynamicAccessors\Test;

use EntireStudio\DynamicAccessors\Test\Stub\{
    Cut,
    CutWithConstructorAndPrivateProperties
};
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class DynamicAccessorTest extends TestCase
{
    private string $firstName = 'John';
    private string $lastName = 'Doe';

    #[TestDox('Accessors declared on properties')]
    public function testAccessorsOnProperties(): void
    {
        $cut = new Cut();

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
        $cut = new CutWithConstructorAndPrivateProperties(
            $this->firstName,
            $this->lastName
        );

        $this->assertEquals($this->firstName, $cut->firstName());
        $cut->firstName('NOT ' . $this->firstName);
        $this->assertEquals('NOT ' . $this->firstName, $cut->firstName());

        $this->assertEquals($this->lastName, $cut->getLastName());
        $cut->setLastName('NOT ' . $this->lastName);
        $this->assertEquals('NOT ' . $this->lastName, $cut->getLastName());
    }
}
