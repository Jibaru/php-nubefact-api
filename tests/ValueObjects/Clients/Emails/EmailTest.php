<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Clients\Emails;

use Exception;
use Faker\Factory;
use Faker\Generator;
use Jibaru\NubefactApi\ValueObjects\Clients\Emails\Email;
use Jibaru\NubefactApi\ValueObjects\Clients\Emails\Exceptions\NotAllowedEmail;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
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
     * @throws NotAllowedEmail
     */
    public function testNewInstance(): void
    {
        $expectedValue = $this->faker->email();

        $instance = new Email($expectedValue);
        $this->assertNotNull($instance);

        $value = $instance->value();

        $this->assertSame($expectedValue, $value);
    }

    /**
     * @test
     */
    public function testInvalidEmailThrowsException(): void
    {
        $MAX_ALLOWED_CHARACTERS = 250;

        $value = $this->faker->text($MAX_ALLOWED_CHARACTERS);

        try {
            new Email($value);
            $this->fail();
        } catch (Exception $exception) {
            $this->assertTrue($exception instanceof NotAllowedEmail);
        }
    }

    /**
     * @test
     */
    public function testValueLengthGreaterThanMaxAllowedCharacters(): void
    {
        $MAX_ALLOWED_CHARACTERS = 250;

        $value = $this->faker->regexify('[A-Za-z0-9]{' . ($MAX_ALLOWED_CHARACTERS + 1) . '}');
        $value .= '@email.test';

        try {
            new Email($value);
            $this->fail();
        } catch (Exception $exception) {
            $this->assertTrue($exception instanceof NotAllowedEmail);
        }
    }
}
