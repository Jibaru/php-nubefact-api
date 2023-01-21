<?php

namespace Jibaru\NubefactApi\ValueObjects\SunatTransactions;

class OperationSubjectToPerception extends SunatTransaction
{
    public function __construct()
    {
        parent::__construct('OPERACIÓN SUJETA A PERCEPCIÓN', 7);
    }
}
