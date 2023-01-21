<?php

namespace Jibaru\NubefactApi\ValueObjects\SunatTransactions;

class AdvancesInternalSale extends SunatTransaction
{
    public function __construct()
    {
        parent::__construct('VENTA INTERNA - ANTICIPOS', 4);
    }
}
