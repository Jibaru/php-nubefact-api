<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Decimals;

use Exception;
use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\TwelvePositiveIntegerWithTwoDecimal;
use PHPUnit\Framework\TestCase;

class TwelvePositiveIntegerWithTwoDecimalTest extends TestCase
{
    /**
     * @test
     * @throws NotAllowedDecimal
     */
    public function testNewInstances()
    {
        $values = [
            [1, 0, '1.00'],
            [11, 0, '11.00'],
            [111, 0, '111.00'],
            [1111, 0, '1111.00'],
            [11111, 0, '11111.00'],
            [111111, 0, '111111.00'],
            [1111111, 0, '1111111.00'],
            [11111111, 0, '11111111.00'],
            [111111111, 0, '111111111.00'],
            [1111111111, 0, '1111111111.00'],
            [11111111111, 0, '11111111111.00'],
            [111111111111, 0, '111111111111.00'],
            [20, 30, '20.30'],
            [300, 49, '300.49'],
            [999999999999, 1, '999999999999.10'],
            [0, 9, '0.90'],
            [100, 99, '100.99'],
            [0, 0, '0.00'],
        ];

        foreach ($values as $value) {
            [$integerPart, $decimalPart, $expectedValue] = $value;

            $instance = new TwelvePositiveIntegerWithTwoDecimal($integerPart, $decimalPart);
            $this->assertSame($expectedValue, $instance->value());
        }
    }

    /**
     * @test
     */
    public function testNewInstancesFails()
    {
        $values = [
            [1_999_999_999_999, 0],
            [1111, 123],
            [PHP_INT_MAX, PHP_INT_MAX],
            [1, PHP_INT_MAX],
            [PHP_INT_MAX, 1],
            [-1, 0],
            [0, -1],
            [-1, -1],
        ];

        foreach ($values as [$integerPart, $decimalPart]) {
            try {
                new TwelvePositiveIntegerWithTwoDecimal($integerPart, $decimalPart);
                $this->fail();
            } catch (Exception $exception) {
                $this->assertTrue($exception instanceof NotAllowedDecimal);
            }
        }
    }
}
