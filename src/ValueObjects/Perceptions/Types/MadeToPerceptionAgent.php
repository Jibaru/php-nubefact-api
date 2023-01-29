<?php

namespace Jibaru\NubefactApi\ValueObjects\Perceptions\Types;

use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\Exceptions\NotAllowedType;

class MadeToPerceptionAgent extends Type
{
    /**
     * @throws NotAllowedType
     */
    public function __construct()
    {
        parent::__construct(
            'PERCEPCIÓN REALIZADA AL AGENTE DE PERCEPCIÓN CON TASA ESPECIAL - TASA 0.5%',
            3
        );
    }
}
