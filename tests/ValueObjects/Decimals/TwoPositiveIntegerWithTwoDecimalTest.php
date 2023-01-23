<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Decimals;

use Exception;
use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\TwoPositiveIntegerWithTwoDecimal;
use PHPUnit\Framework\TestCase;

class TwoPositiveIntegerWithTwoDecimalTest extends TestCase
{
    /**
     * @test
     * @throws NotAllowedDecimal
     */
    public function testNewInstancesFromFloatRounding()
    {
        $values = [
            [1, '1.00'],
            [2.300, '2.30'],
            [3.49, '3.49'],
            [9.990000, '9.99'],
            [0.9, '0.90'],
            [19.999, '20.00'],
            [10.111, '10.11'],
            [0, '0.00'],
            [7.99, '7.99'],
        ];

        foreach ($values as $value) {
            [$exact,  $expectedValue] = $value;

            $instance = TwoPositiveIntegerWithTwoDecimal::fromFloatRounding($exact);
            $this->assertSame($expectedValue, $instance->value());
        }
    }

    /**
     * @test
     */
    public function testNewInstancesFromFloatRoundingFails()
    {
        $values = [
            100.0,
            110,
            99.9999,
            100000,
            PHP_INT_MAX,
            -1,
        ];

        foreach ($values as $value) {
            try {
                TwoPositiveIntegerWithTwoDecimal::fromFloatRounding($value);
                $this->fail();
            } catch (Exception $exception) {
                $this->assertTrue($exception instanceof NotAllowedDecimal);
            }
        }
    }
}
