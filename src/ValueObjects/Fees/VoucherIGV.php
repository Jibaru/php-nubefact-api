<?php

namespace Jibaru\NubefactApi\ValueObjects\Fees;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Decimals\Decimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\TwelvePositiveIntegerWithTwoDecimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\TwoPositiveIntegerWithTwoDecimal;

class VoucherIGV implements Arrayable
{
    /**
     * @var string
     */
    protected string $name = 'IGV';

    /**
     * @var Decimal
     */
    protected Decimal $total;

    /**
     * @var Decimal
     */
    protected Decimal $percentage;

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $total
     * @param TwoPositiveIntegerWithTwoDecimal $percentage
     */
    public function __construct(
        TwelvePositiveIntegerWithTwoDecimal $total,
        TwoPositiveIntegerWithTwoDecimal $percentage
    ) {
        $this->total = $total;
        $this->percentage = $percentage;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return Decimal
     */
    public function value(): Decimal
    {
        return $this->total;
    }

    /**
     * @return Decimal
     */
    public function percentage(): Decimal
    {
        return $this->percentage;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name(),
            'value' => $this->value()->toArray(),
            'percentage' => $this->percentage()->toArray(),
        ];
    }
}
