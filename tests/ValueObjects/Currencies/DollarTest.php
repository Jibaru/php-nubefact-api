<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Currencies;

use Jibaru\NubefactApi\ValueObjects\Currencies\Dollar;
use PHPUnit\Framework\TestCase;

class DollarTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'DÓLARES';
        $expectedValue = 2;

        $instance = new Dollar();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
