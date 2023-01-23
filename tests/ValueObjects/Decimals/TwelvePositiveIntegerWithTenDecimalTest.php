<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Decimals;

use Exception;
use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\TwelvePositiveIntegerWithTenDecimal;
use PHPUnit\Framework\TestCase;

class TwelvePositiveIntegerWithTenDecimalTest extends TestCase
{
    /**
     * @test
     * @throws NotAllowedDecimal
     */
    public function testNewInstances()
    {
        $values = [
            [1, 0, '1.0000000000'],
            [11, 0, '11.0000000000'],
            [111, 0, '111.0000000000'],
            [1111, 0, '1111.0000000000'],
            [11111, 0, '11111.0000000000'],
            [111111, 0, '111111.0000000000'],
            [1111111, 0, '1111111.0000000000'],
            [11111111, 0, '11111111.0000000000'],
            [111111111, 0, '111111111.0000000000'],
            [1111111111, 0, '1111111111.0000000000'],
            [11111111111, 0, '11111111111.0000000000'],
            [111111111111, 0, '111111111111.0000000000'],
            [20, 300, '20.3000000000'],
            [300, 4999, '300.4999000000'],
            [8000000000, 11231, '8000000000.1123100000'],
            [0, 9, '0.9000000000'],
            [100, 9999999999, '100.9999999999'],
            [0, 111199999, '0.1111999990'],
            [0, 0, '0.0000000000'],
            [999, 88888, '999.8888800000'],
        ];

        foreach ($values as $value) {
            [$integerPart, $decimalPart, $expectedValue] = $value;

            $instance = new TwelvePositiveIntegerWithTenDecimal($integerPart, $decimalPart);
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
            [1111, 12345678911],
            [PHP_INT_MAX, PHP_INT_MAX],
            [1, PHP_INT_MAX],
            [PHP_INT_MAX, 1],
            [-1, 0],
            [0, -1],
            [-1, -1],
        ];

        foreach ($values as [$integerPart, $decimalPart]) {
            try {
                new TwelvePositiveIntegerWithTenDecimal($integerPart, $decimalPart);
                $this->fail();
            } catch (Exception $exception) {
                $this->assertTrue($exception instanceof NotAllowedDecimal);
            }
        }
    }
}
