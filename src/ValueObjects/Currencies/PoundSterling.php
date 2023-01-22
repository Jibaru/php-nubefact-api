<?php

namespace Jibaru\NubefactApi\ValueObjects\Currencies;

class PoundSterling extends Currency
{
    public function __construct()
    {
        parent::__construct('LIBRA ESTERLINA', 4);
    }
}
