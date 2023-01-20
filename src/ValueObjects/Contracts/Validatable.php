<?php

namespace Jibaru\NubefactApi\ValueObjects\Contracts;

interface Validatable
{
    /**
     * @return bool
     */
    public function isValid(): bool;
}
