<?php

namespace Jibaru\NubefactApi\ValueObjects\VoucherTypes;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;

abstract class VoucherType implements Arrayable
{
    /**
     * @var string
     */
    protected string $type;

    /**
     * @var int
     */
    protected int $value;

    /**
     * @param string $type
     * @param int $value
     */
    public function __construct(string $type, int $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'value' => $this->value,
        ];
    }
}
