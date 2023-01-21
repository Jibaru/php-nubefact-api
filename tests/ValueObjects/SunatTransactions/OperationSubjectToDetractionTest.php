<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\SunatTransactions;

use Jibaru\NubefactApi\ValueObjects\SunatTransactions\OperationSubjectToDetraction;
use PHPUnit\Framework\TestCase;

class OperationSubjectToDetractionTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'OPERACIÓN SUJETA A DETRACCIÓN';
        $expectedValue = 30;

        $instance = new OperationSubjectToDetraction();

        $name = $instance->name();
        $value = $instance->value();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedValue, $value);
    }
}
