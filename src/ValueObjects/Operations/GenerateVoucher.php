<?php

namespace Jibaru\NubefactApi\ValueObjects\Operations;

class GenerateVoucher extends Operation
{
    public const VALUE = 'generar_comprobante';

    public function __construct()
    {
        parent::__construct(GenerateVoucher::VALUE);
    }
}
