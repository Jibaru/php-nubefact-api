<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\SunatTransactions;

use Jibaru\NubefactApi\ValueObjects\SunatTransactions\NonDomesticSalesThatNotQualifyAsExportation;
use PHPUnit\Framework\TestCase;

class NonDomesticSalesThatNotQualifyAsExportationTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'VENTAS NO DOMICILIADOS QUE NO CALIFICAN COMO EXPORTACIÓN';
        $expectedValue = 29;

        $instance = new NonDomesticSalesThatNotQualifyAsExportation();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
