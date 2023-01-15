<?php

namespace Jibaru\NubefactApi\ValueObjects\VoucherTypes;

class DebitNoteVoucherType extends VoucherType
{
    public const TYPE = 'NOTA DE DÉBITO';
    public const VALUE = 4;

    public function __construct()
    {
        parent::__construct(DebitNoteVoucherType::TYPE, DebitNoteVoucherType::VALUE);
    }
}
