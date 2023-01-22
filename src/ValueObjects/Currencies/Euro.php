<?php

namespace Jibaru\NubefactApi\ValueObjects\Currencies;

class Euro extends Currency
{
    public function __construct()
    {
        parent::__construct('EUROS', 3);
    }
}
