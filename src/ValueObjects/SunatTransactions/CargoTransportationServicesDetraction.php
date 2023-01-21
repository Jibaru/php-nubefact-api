<?php

namespace Jibaru\NubefactApi\ValueObjects\SunatTransactions;

class CargoTransportationServicesDetraction extends SunatTransaction
{
    public function __construct()
    {
        parent::__construct('DETRACCIÓN - SERVICIOS DE TRANSPORTE CARGA', 33);
    }
}
