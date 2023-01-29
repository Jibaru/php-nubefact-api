<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Perceptions\Types;

use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\InternalSale;
use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\MadeToPerceptionAgent;
use PHPUnit\Framework\TestCase;

class MadeToPerceptionAgentTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'PERCEPCIÓN REALIZADA AL AGENTE DE PERCEPCIÓN CON TASA ESPECIAL - TASA 0.5%';
        $expectedValue = 3;

        $instance = new MadeToPerceptionAgent();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
