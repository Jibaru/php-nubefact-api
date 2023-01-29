<?php

namespace Jibaru\NubefactApi\ValueObjects\Fees;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Decimals\Decimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\TwelvePositiveIntegerWithTwoDecimal;

class VoucherISC implements Arrayable
{
    /**
     * @var string
     */
    protected string $name = 'ISC';

    /**
     * @var Decimal
     */
    protected Decimal $total;

    /**
     * @param TwelvePositiveIntegerWithTwoDecimal $total
     */
    public function __construct(TwelvePositiveIntegerWithTwoDecimal $total)
    {
        $this->total = $total;
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
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name(),
            'value' => $this->value()->toArray(),
        ];
    }
}
