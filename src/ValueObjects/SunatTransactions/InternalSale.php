<?php

namespace Jibaru\NubefactApi\ValueObjects\SunatTransactions;

class InternalSale extends SunatTransaction
{
    public function __construct()
    {
        parent::__construct('VENTA INTERNA', 1);
    }
}
