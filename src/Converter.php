<?php

namespace PHPassword\DtoEntityBridge;


use PHPassword\Dto\DtoInterface;

class Converter
{
    /**
     * @var ConverterStrategyInterface[]
     */
    private $strategies = [];

    /**
     * Converter constructor.
     * @param ConverterStrategyInterface[] $strategies
     */
    public function __construct(array $strategies = [])
    {
        foreach($strategies as $strategy){
            $this->addStrategy($strategy);
        }
    }

    /**
     * @param ConverterStrategyInterface $strategy
     */
    public function addStrategy(ConverterStrategyInterface $strategy): void
    {
        $this->strategies[] = $strategy;
    }

    /**
     * @param $entity
     * @param string $dtoClass
     * @return DtoInterface
     * @throws ConverterException
     */
    public function convertEntity($entity, string $dtoClass): DtoInterface
    {
        foreach($this->strategies as $strategy){
            if($strategy->canConvertEntity($entity, $dtoClass)){
                return $strategy->convertEntity($entity, $dtoClass);
            }
        }

        throw new ConverterException('No strategy for converting entity');
    }

    /**
     * @param DtoInterface $dto
     * @param string $entityClass
     * @return object
     * @throws ConverterException
     */
    public function convertDto(DtoInterface $dto, string $entityClass)
    {
        foreach($this->strategies as $strategy){
            if($strategy->canConvertDto($dto, $entityClass)){
                return $strategy->convertDto($dto, $entityClass);
            }
        }

        throw new ConverterException('No strategy for converting entity');
    }
}