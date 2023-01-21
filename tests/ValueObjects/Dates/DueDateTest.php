<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Dates;

use DateTime;
use Faker\Factory;
use Faker\Generator;
use Jibaru\NubefactApi\ValueObjects\Dates\DueDate;
use Jibaru\NubefactApi\ValueObjects\Dates\Exceptions\NotAllowedDate;
use Jibaru\NubefactApi\ValueObjects\Dates\IssueDate;
use PHPUnit\Framework\TestCase;

class DueDateTest extends TestCase
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
     * @throws NotAllowedDate
     */
    public function testNewInstance(): void
    {
        $expectedValue = $this->faker->dateTime();
        $instance = new DueDate($expectedValue);
        $this->assertNotNull($instance);

        $value = $instance->value();

        $this->assertSame($expectedValue, $value);
    }

    /**
     * @test
     * @throws NotAllowedDate
     */
    public function testDateFormatIsRight(): void
    {
        $RIGHT_FORMAT = 'd-m-Y';

        $value = $this->faker->dateTime();
        $expectedValue = $value->format($RIGHT_FORMAT);

        $instance = new DueDate($value);

        $formattedValue = $instance->formattedValue();

        $this->assertSame($expectedValue, $formattedValue);
    }

    /**
     * @test
     */
    public function testDueDateIsGreaterThanIssueDate(): void
    {
        try {
            $issueDate = new IssueDate(new DateTime('now +1 day'));
            new DueDate(new DateTime('now'), $issueDate);
        } catch (\Exception $exception) {
            $this->assertTrue($exception instanceof NotAllowedDate);
        }
    }
}
