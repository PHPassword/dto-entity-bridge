<?php

namespace PHPassword\DtoEntityBridge;


use PHPassword\Dto\DtoInterface;

interface ConverterStrategyInterface
{
    /**
     * @param object $entity
     * @param string $dtoClass
     * @return bool
     */
    public function canConvertEntity($entity, string $dtoClass): bool;

    /**
     * @param object $entity
     * @param string $dtoClass
     * @return DtoInterface
     */
    public function convertEntity($entity, string $dtoClass): DtoInterface;

    /**
     * @param DtoInterface $dto
     * @param string $entityClass
     * @return bool
     */
    public function canConvertDto(DtoInterface $dto, string $entityClass): bool;

    /**
     * @param DtoInterface $dto
     * @param string $entityClass
     * @return object
     */
    public function convertDto(DtoInterface $dto, string $entityClass);
}