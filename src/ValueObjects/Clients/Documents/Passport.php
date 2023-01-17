<?php

namespace Jibaru\NubefactApi\ValueObjects\Clients\Documents;

use Jibaru\NubefactApi\ValueObjects\Clients\Documents\Exceptions\NotAllowedClientDocument;

class Passport extends Document
{
    public const MAX_VALUE_LENGTH = 12;

    /**
     * @param string $value
     * @throws NotAllowedClientDocument
     */
    public function __construct(string $value)
    {
        parent::__construct(
            'Pasaporte',
            '7',
            $value
        );
    }

    /**
     * @return bool
     */
    protected function isValidValue(): bool
    {
        return $this->valueLength() <= Passport::MAX_VALUE_LENGTH;
    }
}
