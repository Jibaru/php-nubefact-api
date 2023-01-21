<?php

namespace Jibaru\NubefactApi\ValueObjects\SunatTransactions;

class OperationSubjectToDetraction extends SunatTransaction
{
    public function __construct()
    {
        parent::__construct('OPERACIÓN SUJETA A DETRACCIÓN', 30);
    }
}
