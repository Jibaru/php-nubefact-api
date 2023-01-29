<?php

namespace Jibaru\NubefactApi\ValueObjects\Perceptions\Types;

use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\Exceptions\NotAllowedType;

class InternalSale extends Type
{
    /**
     * @throws NotAllowedType
     */
    public function __construct()
    {
        parent::__construct('PERCEPCIÓN VENTA INTERNA - TASA 2%', 1);
    }
}
