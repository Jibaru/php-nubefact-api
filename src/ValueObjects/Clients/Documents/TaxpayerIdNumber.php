<?php

namespace Jibaru\NubefactApi\ValueObjects\Clients\Documents;

use Jibaru\NubefactApi\ValueObjects\Clients\Documents\Exceptions\NotAllowedClientDocument;

class TaxpayerIdNumber extends Document
{
    public const VALUE_LENGTH = 11;

    /**
     * @param string $value
     * @throws NotAllowedClientDocument
     */
    public function __construct(string $value)
    {
        parent::__construct(
            'Registro Único del Contribuyente',
            '6',
            $value
        );
    }

    /**
     * @return bool
     */
    protected function isValidValue(): bool
    {
        return $this->valueLength() == TaxpayerIdNumber::VALUE_LENGTH;
    }
}
