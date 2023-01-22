<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Currencies;

use Jibaru\NubefactApi\ValueObjects\Currencies\Euro;
use PHPUnit\Framework\TestCase;

class EuroTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'EUROS';
        $expectedValue = 3;

        $instance = new Euro();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
