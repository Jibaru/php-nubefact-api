<?php

namespace Jibaru\NubefactApi\ValueObjects\SunatTransactions;

class HydrobiologicalResourcesDetraction extends SunatTransaction
{
    public function __construct()
    {
        parent::__construct('DETRACCIÓN - RECURSOS HIDROBIOLÓGICOS', 31);
    }
}
