<?php

namespace Jibaru\NubefactApi\ValueObjects\SunatTransactions;

class Exportation extends SunatTransaction
{
    public function __construct()
    {
        parent::__construct('EXPORTACIÓN', 2);
    }
}
