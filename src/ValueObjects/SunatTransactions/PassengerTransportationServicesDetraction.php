<?php

namespace Jibaru\NubefactApi\ValueObjects\SunatTransactions;

class PassengerTransportationServicesDetraction extends SunatTransaction
{
    public function __construct()
    {
        parent::__construct('DETRACCIÓN - SERVICIOS DE TRANSPORTE DE PASAJEROS', 32);
    }
}
