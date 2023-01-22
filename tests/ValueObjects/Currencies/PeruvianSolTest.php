<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Currencies;

use Jibaru\NubefactApi\ValueObjects\Currencies\PeruvianSol;
use PHPUnit\Framework\TestCase;

class PeruvianSolTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'SOLES';
        $expectedValue = 1;

        $instance = new PeruvianSol();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
