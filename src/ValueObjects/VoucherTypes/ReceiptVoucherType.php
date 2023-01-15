<?php

namespace Jibaru\NubefactApi\ValueObjects\VoucherTypes;

class ReceiptVoucherType extends VoucherType
{
    public const TYPE = 'BOLETA';
    public const VALUE = 2;

    public function __construct()
    {
        parent::__construct(ReceiptVoucherType::TYPE, ReceiptVoucherType::VALUE);
    }
}
