<?php

namespace Jibaru\NubefactApi\ValueObjects\VoucherTypes;

class CreditNoteVoucherType extends VoucherType
{
    public const TYPE = 'NOTA DE CRÉDITO';
    public const VALUE = 3;

    public function __construct()
    {
        parent::__construct(CreditNoteVoucherType::TYPE, CreditNoteVoucherType::VALUE);
    }
}
