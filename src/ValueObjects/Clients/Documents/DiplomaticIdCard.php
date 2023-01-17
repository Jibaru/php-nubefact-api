<?php

namespace Jibaru\NubefactApi\ValueObjects\Clients\Documents;

use Jibaru\NubefactApi\ValueObjects\Clients\Documents\Exceptions\NotAllowedClientDocument;

class DiplomaticIdCard extends Document
{
    /**
     * @param string $value
     * @throws NotAllowedClientDocument
     */
    public function __construct(string $value)
    {
        parent::__construct(
            'Cédula Diplomática de Identidad',
            'A',
            $value
        );
    }
}
