<?php

namespace Jibaru\NubefactApi\ValueObjects\Amounts;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Decimals\Decimal;

class InvoiceAmount implements Arrayable
{
    /**
     * @var Decimal
     */
    protected Decimal $total;

    /**
     * @var Decimal|null
     */
    protected ?Decimal $globalDiscount;

    /**
     * @var Decimal|null
     */
    protected ?Decimal $totalDiscount;

    /**
     * @var Decimal|null
     */
    protected ?Decimal $totalAdvance;

    /**
     * @var Decimal|null
     */
    protected ?Decimal $totalTaxed;

    /**
     * @var Decimal|null
     */
    protected ?Decimal $totalUnaffected;

    /**
     * @var Decimal|null
     */
    protected ?Decimal $totalExonerated;

    /**
     * @var Decimal|null
     */
    protected ?Decimal $totalFree;

    /**
     * @var Decimal|null
     */
    protected ?Decimal $totalOtherCharges;

    /**
     * @param Decimal $total
     * @param Decimal|null $globalDiscount
     * @param Decimal|null $totalDiscount
     * @param Decimal|null $totalAdvance
     * @param Decimal|null $totalTaxed
     * @param Decimal|null $totalUnaffected
     * @param Decimal|null $totalExonerated
     * @param Decimal|null $totalFree
     * @param Decimal|null $totalOtherCharges
     */
    public function __construct(
        Decimal $total,
        ?Decimal $globalDiscount = null,
        ?Decimal $totalDiscount = null,
        ?Decimal $totalAdvance = null,
        ?Decimal $totalTaxed = null,
        ?Decimal $totalUnaffected = null,
        ?Decimal $totalExonerated = null,
        ?Decimal $totalFree = null,
        ?Decimal $totalOtherCharges = null
    ) {
        $this->total = $total;
        $this->globalDiscount = $globalDiscount;
        $this->totalDiscount = $totalDiscount;
        $this->totalAdvance = $totalAdvance;
        $this->totalTaxed = $totalTaxed;
        $this->totalUnaffected = $totalUnaffected;
        $this->totalExonerated = $totalExonerated;
        $this->totalFree = $totalFree;
        $this->totalOtherCharges = $totalOtherCharges;
    }

    /**
     * @return Decimal
     */
    public function total(): Decimal
    {
        return $this->total;
    }

    /**
     * @return Decimal|null
     */
    public function globalDiscount(): ?Decimal
    {
        return $this->globalDiscount;
    }

    /**
     * @return Decimal|null
     */
    public function totalDiscount(): ?Decimal
    {
        return $this->totalDiscount;
    }

    /**
     * @return Decimal|null
     */
    public function totalAdvance(): ?Decimal
    {
        return $this->totalAdvance;
    }

    /**
     * @return Decimal|null
     */
    public function totalTaxed(): ?Decimal
    {
        return $this->totalTaxed;
    }

    /**
     * @return Decimal|null
     */
    public function totalUnaffected(): ?Decimal
    {
        return $this->totalUnaffected;
    }

    /**
     * @return Decimal|null
     */
    public function totalExonerated(): ?Decimal
    {
        return $this->totalExonerated;
    }

    /**
     * @return Decimal|null
     */
    public function totalFree(): ?Decimal
    {
        return $this->totalFree;
    }

    /**
     * @return Decimal|null
     */
    public function totalOtherCharges(): ?Decimal
    {
        return $this->totalOtherCharges;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'total' => $this->total(),
            'global_discount' => $this->globalDiscount(),
            'total_discount' => $this->totalDiscount(),
            'total_advance' => $this->totalAdvance(),
            'total_taxed' => $this->totalTaxed(),
            'total_unaffected' => $this->totalUnaffected(),
            'total_exonerated' => $this->totalExonerated(),
            'total_free' => $this->totalFree(),
            'total_other_charges' => $this->totalOtherCharges(),
        ];
    }
}
