<?php

namespace Jibaru\NubefactApi\ValueObjects\Currencies;

class PeruvianSol extends Currency
{
    public function __construct()
    {
        parent::__construct('SOLES', 1);
    }
}
