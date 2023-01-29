<?php

namespace Jibaru\NubefactApi\ValueObjects\ExchangeRates;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Decimals\Decimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\SinglePositiveIntegerWithTwoDecimal;

class ExchangeRate implements Arrayable
{
    /**
     * @var string
     */
    protected string $name = 'tipo_de_cambio';

    /**
     * @var Decimal
     */
    protected Decimal $value;

    /**
     * @param SinglePositiveIntegerWithTwoDecimal $value
     */
    public function __construct(SinglePositiveIntegerWithTwoDecimal $value)
    {
        $this->value = $value;
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
        return $this->value;
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
