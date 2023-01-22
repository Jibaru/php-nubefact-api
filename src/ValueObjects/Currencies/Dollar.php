<?php

namespace Jibaru\NubefactApi\ValueObjects\Currencies;

class Dollar extends Currency
{
    public function __construct()
    {
        parent::__construct('DÓLARES', 2);
    }
}
