<?php

declare(strict_types=1);

namespace Gormack\DynamicAccessors;

class Accessor
{
    public function __construct(
        private readonly string $type,
        private readonly string $name,
        private readonly string $propertyName,
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPropertyName(): string
    {
        return $this->propertyName;
    }
}
