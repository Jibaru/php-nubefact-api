<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\SunatTransactions;

use Jibaru\NubefactApi\ValueObjects\SunatTransactions\OperationSubjectToPerception;
use PHPUnit\Framework\TestCase;

class OperationSubjectToPerceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'OPERACIÓN SUJETA A PERCEPCIÓN';
        $expectedValue = 7;

        $instance = new OperationSubjectToPerception();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
