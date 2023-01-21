<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\SunatTransactions;

use Jibaru\NubefactApi\ValueObjects\SunatTransactions\AdvancesInternalSale;
use PHPUnit\Framework\TestCase;

class AdvancesInternalSaleTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'VENTA INTERNA - ANTICIPOS';
        $expectedValue = 4;

        $instance = new AdvancesInternalSale();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
