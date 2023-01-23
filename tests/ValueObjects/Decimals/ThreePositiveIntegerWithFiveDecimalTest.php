<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Decimals;

use Exception;
use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\ThreePositiveIntegerWithFiveDecimal;
use PHPUnit\Framework\TestCase;

class ThreePositiveIntegerWithFiveDecimalTest extends TestCase
{
    /**
     * @test
     * @throws NotAllowedDecimal
     */
    public function testNewInstancesFromFloatRounding()
    {
        $values = [
            [1, '1.00000'],
            [11, '11.00000'],
            [111, '111.00000'],
            [20.300, '20.30000'],
            [300.499999, '300.50000'],
            [800.99999000, '800.99999'],
            [0.9, '0.90000'],
            [100.999999, '101.00000'],
            [0.111199999, '0.11120'],
            [0, '0.00000'],
            [999.88888, '999.88888'],
        ];

        foreach ($values as $value) {
            [$exact,  $expectedValue] = $value;

            $instance = ThreePositiveIntegerWithFiveDecimal::fromFloatRounding($exact);
            $this->assertSame($expectedValue, $instance->value());
        }
    }

    /**
     * @test
     */
    public function testNewInstancesFromFloatRoundingFails()
    {
        $values = [
            10000.0,
            1111,
            999.999995,
            100000,
            5000,
            PHP_INT_MAX,
            -1,
        ];

        foreach ($values as $value) {
            try {
                ThreePositiveIntegerWithFiveDecimal::fromFloatRounding($value);
                $this->fail();
            } catch (Exception $exception) {
                $this->assertTrue($exception instanceof NotAllowedDecimal);
            }
        }
    }
}
