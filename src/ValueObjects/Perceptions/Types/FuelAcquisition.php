<?php

namespace Jibaru\NubefactApi\ValueObjects\Perceptions\Types;

use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\Exceptions\NotAllowedType;

class FuelAcquisition extends Type
{
    /**
     * @throws NotAllowedType
     */
    public function __construct()
    {
        parent::__construct('PERCEPCIÓN ADQUISICIÓN DE COMBUSTIBLE-TASA 1%', 2);
    }
}
