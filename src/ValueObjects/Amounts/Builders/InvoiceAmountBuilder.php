<?php

namespace Jibaru\NubefactApi\ValueObjects\Amounts\Builders;

use Jibaru\NubefactApi\ValueObjects\Amounts\InvoiceAmount;
use Jibaru\NubefactApi\ValueObjects\Decimals\Decimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\TwelvePositiveIntegerWithTwoDecimal;
use stdClass;

class InvoiceAmountBuilder
{
    /**
     * @var Decimal
     */
    protected Decimal $total;

    /**
     * @var stdClass
     */
    protected stdClass $amounts;

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $total
     */
    public function __construct(TwelvePositiveIntegerWithTwoDecimal $total)
    {
        $this->total = $total;
        $this->amounts = new stdClass();
    }

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $total
     * @return InvoiceAmountBuilder
     */
    public static function make(
        TwelvePositiveIntegerWithTwoDecimal $total
    ): InvoiceAmountBuilder {
        return new InvoiceAmountBuilder($total);
    }

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $globalDiscount
     * @return void
     */
    public function setGlobalDiscount(
        TwelvePositiveIntegerWithTwoDecimal $globalDiscount
    ): void {
        $this->amounts->globalDiscount = $globalDiscount;
    }

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $totalDiscount
     * @return void
     */
    public function setTotalDiscount(
        TwelvePositiveIntegerWithTwoDecimal $totalDiscount
    ): void {
        $this->amounts->totalDiscount = $totalDiscount;
    }

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $totalAdvance
     * @return void
     */
    public function setTotalAdvance(
        TwelvePositiveIntegerWithTwoDecimal $totalAdvance
    ): void {
        $this->amounts->totalAdvance = $totalAdvance;
    }

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $totalTaxed
     * @return void
     */
    public function setTotalTaxed(
        TwelvePositiveIntegerWithTwoDecimal $totalTaxed
    ): void {
        $this->amounts->totalTaxed = $totalTaxed;
    }

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $totalUnaffected
     * @return void
     */
    public function setTotalUnaffected(
        TwelvePositiveIntegerWithTwoDecimal $totalUnaffected
    ): void {
        $this->amounts->totalUnaffected = $totalUnaffected;
    }

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $totalExonerated
     * @return void
     */
    public function setTotalExonerated(
        TwelvePositiveIntegerWithTwoDecimal $totalExonerated
    ): void {
        $this->amounts->totalExonerated = $totalExonerated;
    }

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $totalFree
     * @return void
     */
    public function setTotalFree(
        TwelvePositiveIntegerWithTwoDecimal $totalFree
    ): void {
        $this->amounts->totalFree = $totalFree;
    }

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $totalOtherCharges
     * @return void
     */
    public function setTotalOtherCharges(
        TwelvePositiveIntegerWithTwoDecimal $totalOtherCharges
    ): void {
        $this->amounts->totalOtherCharges = $totalOtherCharges;
    }

    /**
     * @return InvoiceAmount
     */
    public function build(): InvoiceAmount
    {
        return new InvoiceAmount(
            $this->total,
            (
                property_exists($this->amounts, 'globalDiscount')
                    ? $this->amounts->globalDiscount
                    : null
            ),
            (
                property_exists($this->amounts, 'totalDiscount')
                    ? $this->amounts->totalDiscount
                    : null
            ),
            (
                property_exists($this->amounts, 'totalAdvance')
                    ? $this->amounts->totalAdvance
                    : null
            ),
            (
                property_exists($this->amounts, 'totalTaxed')
                    ? $this->amounts->totalTaxed
                    : null
            ),
            (
                property_exists($this->amounts, 'totalUnaffected')
                    ? $this->amounts->totalUnaffected
                    : null
            ),
            (
                property_exists($this->amounts, 'totalExonerated')
                    ? $this->amounts->totalExonerated
                    : null
            ),
            (
                property_exists($this->amounts, 'totalFree')
                    ? $this->amounts->totalFree
                    : null
            ),
            (
                property_exists($this->amounts, 'totalOtherCharges')
                    ? $this->amounts->totalOtherCharges
                    : null
            ),
        );
    }
}
