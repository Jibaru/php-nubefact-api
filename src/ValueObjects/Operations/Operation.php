<?php

namespace Jibaru\NubefactApi\ValueObjects\Operations;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;

abstract class Operation implements Arrayable
{
    /**
     * @var string
     */
    protected string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'value' => $this->value,
        ];
    }
}
