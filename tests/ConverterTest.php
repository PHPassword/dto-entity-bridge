<?php

use PHPassword\DtoEntityBridge\Converter;
use PHPassword\DtoEntityBridge\ConverterException;
use PHPassword\UnitTest\TestConverterStrategy;
use PHPassword\UnitTest\TestDto;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testConvertEntity()
    {
        $converter = new Converter([new TestConverterStrategy()]);
        $dto = $converter->convertEntity(new \stdClass(), TestDto::class);

        $this->assertInstanceOf(TestDto::class, $dto);
    }

    /**
     * @throws \Exception
     */
    public function testConvertDto()
    {
        $converter = new Converter([new TestConverterStrategy()]);
        $entity = $converter->convertDto(new TestDto('Sebastian', 32), \stdClass::class);

        $this->assertInstanceOf(\stdClass::class, $entity);
    }

    /**
     * @throws ConverterException
     */
    public function testConvertEntityFail()
    {
        $converter = new Converter();
        $this->expectException(ConverterException::class);
        $converter->convertEntity(new \stdClass(), TestDto::class);
    }

    /**
     * @throws ConverterException
     */
    public function testConvertDtoFail()
    {
        $converter = new Converter();
        $this->expectException(ConverterException::class);
        $converter->convertDto(new TestDto('Matthias', 31), \stdClass::class);
    }
}