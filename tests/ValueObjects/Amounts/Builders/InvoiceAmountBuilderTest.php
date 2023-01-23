<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Amounts\Builders;

use Faker\Factory;
use Faker\Generator;
use Jibaru\NubefactApi\ValueObjects\Amounts\Builders\InvoiceAmountBuilder;
use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\TwelvePositiveIntegerWithTwoDecimal;
use PHPUnit\Framework\TestCase;

class InvoiceAmountBuilderTest extends TestCase
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
     * @throws NotAllowedDecimal
     */
    public function testNewInstanceBuilt(): void
    {
        $amount = new TwelvePositiveIntegerWithTwoDecimal(100, 2);

        $builder = InvoiceAmountBuilder::make($amount);
        $invoiceAmount = $builder->build();

        $this->assertNotNull($invoiceAmount->total());
        $this->assertSame($amount, $invoiceAmount->total());
    }

    /**
     * @throws NotAllowedDecimal
     */
    public function testAllPropertiesSet(): void
    {
        $amounts = [];

        for ($i = 1; $i <= 9; $i++) {
            $integerPart = $this->faker->numberBetween(0, 999_999_999_999);
            $decimalPart = $this->faker->numberBetween(0, 99);
            $amounts[] = new TwelvePositiveIntegerWithTwoDecimal($integerPart, $decimalPart);
        }

        $builder = InvoiceAmountBuilder::make($amounts[0]);
        $builder->setGlobalDiscount($amounts[1]);
        $builder->setTotalDiscount($amounts[2]);
        $builder->setTotalAdvance($amounts[3]);
        $builder->setTotalTaxed($amounts[4]);
        $builder->setTotalExonerated($amounts[5]);
        $builder->setTotalUnaffected($amounts[6]);
        $builder->setTotalFree($amounts[7]);
        $builder->setTotalOtherCharges($amounts[8]);

        $invoiceAmount = $builder->build();

        $this->assertSame($amounts[0], $invoiceAmount->total());
        $this->assertSame($amounts[1], $invoiceAmount->globalDiscount());
        $this->assertSame($amounts[2], $invoiceAmount->totalDiscount());
        $this->assertSame($amounts[3], $invoiceAmount->totalAdvance());
        $this->assertSame($amounts[4], $invoiceAmount->totalTaxed());
        $this->assertSame($amounts[5], $invoiceAmount->totalExonerated());
        $this->assertSame($amounts[6], $invoiceAmount->totalUnaffected());
        $this->assertSame($amounts[7], $invoiceAmount->totalFree());
        $this->assertSame($amounts[8], $invoiceAmount->totalOtherCharges());
    }
}
