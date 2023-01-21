<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Dates;

use Faker\Factory;
use Faker\Generator;
use Jibaru\NubefactApi\ValueObjects\Dates\IssueDate;
use PHPUnit\Framework\TestCase;

class IssueDateTest extends TestCase
{
    /**
     * @var Generator
     */
    private Generator $faker;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->faker = Factory::create();
    }

    /**
     * @test
     */
    public function testNewInstance(): void
    {
        $expectedValue = $this->faker->dateTime();
        $instance = new IssueDate($expectedValue);
        $this->assertNotNull($instance);

        $value = $instance->value();

        $this->assertSame($expectedValue, $value);
    }

    /**
     * @test
     */
    public function testDateFormatIsRight(): void
    {
        $RIGHT_FORMAT = 'd-m-Y';

        $value = $this->faker->dateTime();
        $expectedValue = $value->format($RIGHT_FORMAT);

        $instance = new IssueDate($value);

        $formattedValue = $instance->formattedValue();

        $this->assertSame($expectedValue, $formattedValue);
    }
}
