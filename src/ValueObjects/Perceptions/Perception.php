<?php

namespace Jibaru\NubefactApi\ValueObjects\Perceptions;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Decimals\Decimal;
use Jibaru\NubefactApi\ValueObjects\Decimals\TwelvePositiveIntegerWithTwoDecimal;
use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\Type;

class Perception implements Arrayable
{
    /**
     * @var Type
     */
    protected Type $type;

    /**
     * @var Decimal
     */
    protected Decimal $taxBase;

    /**
     * @var Decimal
     */
    protected Decimal $total;

    /**
     * @var Decimal
     */
    protected Decimal $totalWithPerception;

    /**
     * @param Type $type
     * @param TwelvePositiveIntegerWithTwoDecimal $taxBase
     * @param TwelvePositiveIntegerWithTwoDecimal $total
     * @param TwelvePositiveIntegerWithTwoDecimal $totalWithPerception
     */
    public function __construct(
        Type $type,
        TwelvePositiveIntegerWithTwoDecimal $taxBase,
        TwelvePositiveIntegerWithTwoDecimal $total,
        TwelvePositiveIntegerWithTwoDecimal $totalWithPerception
    ) {
        $this->type = $type;
        $this->taxBase = $taxBase;
        $this->total = $total;
        $this->totalWithPerception = $totalWithPerception;
    }

    /**
     * @return Type
     */
    public function type(): Type
    {
        return $this->type;
    }

    /**
     * @return Decimal
     */
    public function taxBase(): Decimal
    {
        return $this->taxBase;
    }

    /**
     * @return Decimal
     */
    public function total(): Decimal
    {
        return $this->total;
    }

    /**
     * @return Decimal
     */
    public function totalWithPerception(): Decimal
    {
        return $this->totalWithPerception;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type()->toArray(),
            'tax_base' => $this->taxBase()->toArray(),
            'total' => $this->total()->toArray(),
            'total_with_perception' => $this->totalWithPerception()->toArray(),
        ];
    }
}
