<?php

namespace Jibaru\NubefactApi\ValueObjects\Dates;

use DateTime;
use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;

abstract class Date implements Arrayable
{
    public const FORMAT = 'd-m-Y';

    /**
     * @var DateTime
     */
    protected DateTime $value;

    /**
     * @param DateTime $value
     */
    public function __construct(DateTime $value)
    {
        $this->value = $value;
    }

    /**
     * @return DateTime
     */
    public function value(): DateTime
    {
        return $this->value;
    }

    public function formattedValue(): string
    {
        return $this->value->format(Date::FORMAT);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'value' => $this->formattedValue(),
        ];
    }
}
