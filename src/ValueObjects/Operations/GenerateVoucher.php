<?php

namespace Jibaru\NubefactApi\ValueObjects\Operations;

class GenerateVoucher extends Operation
{
    public const TYPE = 'generar_comprobante';

    public function __construct()
    {
        parent::__construct(GenerateVoucher::TYPE);
    }
}
