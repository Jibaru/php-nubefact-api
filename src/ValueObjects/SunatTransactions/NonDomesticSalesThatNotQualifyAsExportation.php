<?php

namespace Jibaru\NubefactApi\ValueObjects\SunatTransactions;

class NonDomesticSalesThatNotQualifyAsExportation extends SunatTransaction
{
    public function __construct()
    {
        parent::__construct(
            'VENTAS NO DOMICILIADOS QUE NO CALIFICAN COMO EXPORTACIÓN',
            29
        );
    }
}
