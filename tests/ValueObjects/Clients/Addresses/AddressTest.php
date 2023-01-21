<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Clients\Addresses;

use Exception;
use Faker\Factory;
use Faker\Generator;
use Jibaru\NubefactApi\ValueObjects\Clients\Adresses\Address;
use Jibaru\NubefactApi\ValueObjects\Clients\Adresses\Exceptions\NotAllowedAddress;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
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
     * @throws NotAllowedAddress
     */
    public function testNewInstance(): void
    {
        $MIN_ALLOWED_CHARACTERS = 1;
        $MAX_ALLOWED_CHARACTERS = 100;

        $expectedValue = $this->faker->realTextBetween($MIN_ALLOWED_CHARACTERS, $MAX_ALLOWED_CHARACTERS);

        $instance = new Address($expectedValue);
        $this->assertNotNull($instance);

        $value = $instance->value();

        $this->assertSame($expectedValue, $value);
    }

    /**
     * @test
     */
    public function testValueLengthIsGreaterThanOneHundredCharacters(): void
    {
        $MAX_ALLOWED_CHARACTERS = 100;

        $value = $this->faker->realTextBetween($MAX_ALLOWED_CHARACTERS + 1);

        try {
            new Address($value);
            $this->fail();
        } catch (Exception $exception) {
            $this->assertTrue($exception instanceof NotAllowedAddress);
        }
    }
}
