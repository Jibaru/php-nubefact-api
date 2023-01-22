<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Currencies;

use Jibaru\NubefactApi\ValueObjects\Currencies\PoundSterling;
use PHPUnit\Framework\TestCase;

class PoundSterlingTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'LIBRA ESTERLINA';
        $expectedValue = 4;

        $instance = new PoundSterling();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
