<?php

declare(strict_types=1);

namespace Tests\Unit\EntireStudio\DynamicAccessors;

use EntireStudio\DynamicAccessors\Accessor;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class AccessorTest extends TestCase
{
    #[TestDox('Simple getters test')]
    public function testGetters(): void
    {
        $type = 'Get';
        $name = 'getFirstName';
        $propertyName = 'firstName';

        $accessor = new Accessor($type, $name, $propertyName);

        $this->assertInstanceOf(Accessor::class, $accessor);
        $this->assertEquals($type, $accessor->getType());
        $this->assertEquals($name, $accessor->getName());
        $this->assertEquals($propertyName, $accessor->getPropertyName());
    }
}
