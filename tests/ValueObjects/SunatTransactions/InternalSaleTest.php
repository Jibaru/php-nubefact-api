<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\SunatTransactions;

use Jibaru\NubefactApi\ValueObjects\SunatTransactions\InternalSale;
use PHPUnit\Framework\TestCase;

class InternalSaleTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'VENTA INTERNA';
        $expectedValue = 1;

        $instance = new InternalSale();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
