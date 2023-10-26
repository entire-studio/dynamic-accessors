<?php

declare(strict_types=1);

namespace EntireStudio\DynamicAccessors;

use Attribute;

#[Attribute(flags: Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class Get
{
    public function __construct(private readonly string $name = '')
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
