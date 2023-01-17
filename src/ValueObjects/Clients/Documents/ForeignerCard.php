<?php

namespace Jibaru\NubefactApi\ValueObjects\Clients\Documents;

use Jibaru\NubefactApi\ValueObjects\Clients\Documents\Exceptions\NotAllowedClientDocument;

class ForeignerCard extends Document
{
    public const MAX_VALUE_LENGTH = 12;

    /**
     * @param string $value
     * @throws NotAllowedClientDocument
     */
    public function __construct(string $value)
    {
        parent::__construct(
            'Carnet de Extranjería',
            '4',
            $value
        );
    }

    /**
     * @return bool
     */
    protected function isValidValue(): bool
    {
        return $this->valueLength() <= ForeignerCard::MAX_VALUE_LENGTH;
    }
}
