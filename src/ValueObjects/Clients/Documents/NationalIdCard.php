<?php

namespace Jibaru\NubefactApi\ValueObjects\Clients\Documents;

use Jibaru\NubefactApi\ValueObjects\Clients\Documents\Exceptions\NotAllowedClientDocument;

class NationalIdCard extends Document
{
    public const VALUE_LENGTH = 8;

    /**
     * @param string $value
     * @throws NotAllowedClientDocument
     */
    public function __construct(string $value)
    {
        parent::__construct(
            'Documento Nacional de Identidad',
            '1',
            $value
        );
    }

    protected function isValidValue(): bool
    {
        return $this->valueLength() == NationalIdCard::VALUE_LENGTH;
    }
}
