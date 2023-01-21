<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\SunatTransactions;

use Jibaru\NubefactApi\ValueObjects\SunatTransactions\CargoTransportationServicesDetraction;
use PHPUnit\Framework\TestCase;

class CargoTransportationServicesDetractionTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'DETRACCIÓN - SERVICIOS DE TRANSPORTE CARGA';
        $expectedValue = 33;

        $instance = new CargoTransportationServicesDetraction();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
