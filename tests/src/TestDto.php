<?php

namespace PHPassword\UnitTest;


use PHPassword\Dto\DtoInterface;
use PHPassword\Dto\SimpleDtoImplementation;

class TestDto implements DtoInterface
{
    use SimpleDtoImplementation;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * TestDto constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }


}