<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Perceptions\Types;

use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\FuelAcquisition;
use PHPUnit\Framework\TestCase;

class FuelAcquisitionTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'PERCEPCIÓN ADQUISICIÓN DE COMBUSTIBLE-TASA 1%';
        $expectedValue = 2;

        $instance = new FuelAcquisition();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
