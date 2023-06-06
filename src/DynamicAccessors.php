<?php

declare(strict_types=1);

namespace Gormack\DynamicAccessors;

use ReflectionClass;

trait DynamicAccessors
{
    private bool $areAccessorsInitiated = false;
    /** @var Accessor[] */
    protected array $accessors = [];

    private function initAccessors(): void
    {
        $self = new ReflectionClass($this);
        $properties = $self->getProperties();
        foreach ($properties as $property) {
            foreach ([Get::class, Set::class] as $accessorClass) {
                $propertyAccessors = $property->getAttributes($accessorClass);
                foreach ($propertyAccessors as $propertyAccessor) {
                    $accessor = $propertyAccessor->newInstance();
                    $this->setAccessor(
                        accessorType: $accessor::class,
                        accessorName: $accessor->getName(),
                        propertyName: $property->getName(),
                    );
                }
            }
        }
    }

    public function __call(string $name, array $arguments)
    {
        if (!$this->areAccessorsInitiated) {
            $this->initAccessors();
        }
        $accessor = $this->getAccessor(
            accessorType: !empty($arguments) ? Set::class : Get::class,
            accessorName: $name,
        );
        if ($accessor instanceof Accessor) {
            if ($accessor->getType() === Get::class) {
                return $this->{$accessor->getPropertyName()};
            } else {
                $this->{$accessor->getPropertyName()} = $arguments[0];
            }
        }
    }

    private function setAccessor(string $accessorType, string $accessorName, string $propertyName): void
    {
        $accessorName = !empty($accessorName) ? $accessorName : $propertyName;
        $key = "$accessorType|$accessorName";
        $this->accessors[$key] = new Accessor(
            type: $accessorType,
            name: $accessorName,
            propertyName: $propertyName,
        );
    }

    private function getAccessor(string $accessorType, string $accessorName): ?Accessor
    {
        $key = "$accessorType|$accessorName";
        return $this->accessors[$key] ?? null;
    }
}
