<?php

namespace Jibaru\NubefactApi\ValueObjects\Operations;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;

abstract class Operation implements Arrayable
{
    /**
     * @var string
     */
    protected string $type;

    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
        ];
    }
}
