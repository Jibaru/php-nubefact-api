<?php

namespace Jibaru\NubefactApi\ValueObjects\Currencies;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;

abstract class Currency implements Arrayable
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var int
     */
    protected int $value;

    /**
     * @param string $name
     * @param int $value
     */
    public function __construct(string $name, int $value)
    {
        $this->name = $name;
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
     * @return int
     */
    public function value(): int
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
            'value' => $this->value(),
        ];
    }
}
