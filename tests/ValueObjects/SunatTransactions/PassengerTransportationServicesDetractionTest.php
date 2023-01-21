<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\SunatTransactions;

use Jibaru\NubefactApi\ValueObjects\SunatTransactions\PassengerTransportationServicesDetraction;
use PHPUnit\Framework\TestCase;

class PassengerTransportationServicesDetractionTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'DETRACCIÓN - SERVICIOS DE TRANSPORTE DE PASAJEROS';
        $expectedValue = 32;

        $instance = new PassengerTransportationServicesDetraction();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
