<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\SunatTransactions;

use Jibaru\NubefactApi\ValueObjects\SunatTransactions\HydrobiologicalResourcesDetraction;
use PHPUnit\Framework\TestCase;

class HydrobiologicalResourcesDetractionTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'DETRACCIÓN - RECURSOS HIDROBIOLÓGICOS';
        $expectedValue = 31;

        $instance = new HydrobiologicalResourcesDetraction();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
