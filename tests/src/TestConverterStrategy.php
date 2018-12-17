<?php

namespace PHPassword\UnitTest;


use PHPassword\Dto\DtoInterface;
use PHPassword\DtoEntityBridge\ConverterStrategyInterface;

class TestConverterStrategy implements ConverterStrategyInterface
{
    public function canConvertEntity($entity, string $dtoClass): bool
    {
        return true;
    }

    public function convertEntity($entity, string $dtoClass): DtoInterface
    {
        return new TestDto('Tim', 40);
    }

    public function canConvertDto(DtoInterface $dto, string $entityClass): bool
    {
        return true;
    }

    public function convertDto(DtoInterface $dto, string $entityClass)
    {
        return new \stdClass;
    }

}