<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Perceptions;

use Faker\Factory;
use Jibaru\NubefactApi\Tests\ObjectMothers\ValueObjects\Decimals\TwelvePositiveIntegerWithTwoDecimalExamples;
use Jibaru\NubefactApi\Tests\ObjectMothers\ValueObjects\Perceptions\Types\TypeExamples;
use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;
use Jibaru\NubefactApi\ValueObjects\Perceptions\Perception;
use PHPUnit\Framework\TestCase;

class PerceptionTest extends TestCase
{
    /**
     * @var TypeExamples
     */
    private TypeExamples $typeExamples;

    /**
     * @var TwelvePositiveIntegerWithTwoDecimalExamples
     */
    private TwelvePositiveIntegerWithTwoDecimalExamples $twelvePositiveIntegerWithTwoDecimalExamples;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $faker = Factory::create();
        $this->typeExamples = new TypeExamples();
        $this->twelvePositiveIntegerWithTwoExamples = new TwelvePositiveIntegerWithTwoDecimalExamples($faker);
    }

    /**
     * @test
     */
    public function testNewInstance()
    {
        $type = $this->typeExamples->random();
        try {
            $taxBase = $this->twelvePositiveIntegerWithTwoExamples->random();
            $total = $this->twelvePositiveIntegerWithTwoExamples->random();
            $totalWithPerception = $this->twelvePositiveIntegerWithTwoExamples->random();
        } catch (NotAllowedDecimal $exception) {
            $this->fail();
        }

        $instance = new Perception(
            $type,
            $taxBase,
            $total,
            $totalWithPerception
        );

        $this->assertSame($type, $instance->type());
        $this->assertSame($taxBase, $instance->taxBase());
        $this->assertSame($total, $instance->total());
        $this->assertSame($totalWithPerception, $instance->totalWithPerception());
    }
}
