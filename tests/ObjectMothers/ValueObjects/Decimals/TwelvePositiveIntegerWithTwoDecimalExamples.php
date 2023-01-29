<?php

namespace Jibaru\NubefactApi\Tests\ObjectMothers\ValueObjects\Decimals;

use Faker\Generator;
use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\TwelvePositiveIntegerWithTwoDecimal;

class TwelvePositiveIntegerWithTwoDecimalExamples
{
    /**
     * @var Generator
     */
    private Generator $faker;

    /**
     * @param Generator $faker
     */
    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * @return TwelvePositiveIntegerWithTwoDecimal
     * @throws NotAllowedDecimal
     */
    public function random(): TwelvePositiveIntegerWithTwoDecimal
    {
        $integers = $this->faker->numberBetween(0, 999999999999);
        $decimals = $this->faker->numberBetween(0, 99);

        return new TwelvePositiveIntegerWithTwoDecimal($integers, $decimals);
    }
}
