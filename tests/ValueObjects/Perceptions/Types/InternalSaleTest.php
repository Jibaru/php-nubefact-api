<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Perceptions\Types;

use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\InternalSale;
use PHPUnit\Framework\TestCase;

class InternalSaleTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'PERCEPCIÓN VENTA INTERNA - TASA 2%';
        $expectedValue = 1;

        $instance = new InternalSale();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
