<?php

namespace Jibaru\NubefactApi\ValueObjects\VoucherTypes;

class InvoiceVoucherType extends VoucherType
{
    public const TYPE = 'FACTURA';
    public const VALUE = 1;

    public function __construct()
    {
        parent::__construct(InvoiceVoucherType::TYPE, InvoiceVoucherType::VALUE);
    }
}
