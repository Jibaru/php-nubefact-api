<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Decimals;

use Exception;
use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\SinglePositiveIntegerWithTwoDecimal;
use PHPUnit\Framework\TestCase;

class SinglePositiveIntegerWithTwoDecimalTest extends TestCase
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
            [0.999, '1.00'],
            [0.111, '0.11'],
            [0, '0.00'],
            [7.00, '7.00'],
        ];

        foreach ($values as $value) {
            [$exact,  $expectedValue] = $value;

            $instance = SinglePositiveIntegerWithTwoDecimal::fromFloatRounding($exact);
            $this->assertSame($expectedValue, $instance->value());
        }
    }

    /**
     * @test
     */
    public function testNewInstancesFromFloatRoundingFails()
    {
        $values = [
            10.0,
            11,
            9.9999,
            100000,
            500,
            PHP_INT_MAX,
            -1,
        ];

        foreach ($values as $value) {
            try {
                SinglePositiveIntegerWithTwoDecimal::fromFloatRounding($value);
                $this->fail();
            } catch (Exception $exception) {
                $this->assertTrue($exception instanceof NotAllowedDecimal);
            }
        }
    }
}
