<?php

namespace Jibaru\NubefactApi\ValueObjects\Contracts;

interface Arrayable
{
    /**
     * @return array
     */
    public function toArray(): array;
}
