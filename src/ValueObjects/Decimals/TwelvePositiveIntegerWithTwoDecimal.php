<?php

namespace Jibaru\NubefactApi\ValueObjects\Decimals;

use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;

class TwelvePositiveIntegerWithTwoDecimal extends Decimal
{
    public const MAX_ALLOWED_INTEGER_CHARACTERS = 12;
    public const MIN_ALLOWED_INTEGER_CHARACTERS = 1;
    public const MAX_ALLOWED_DECIMAL_CHARACTERS = 2;
    public const MIN_ALLOWED_DECIMAL_CHARACTERS = 1;

    /**
     * @param int $integerPart
     * @param int $decimalPart
     * @param string $name
     * @throws NotAllowedDecimal
     */
    public function __construct(
        int $integerPart,
        int $decimalPart,
        string $name = 'TwelvePositiveIntegerWithTwoDecimal'
    ) {
        parent::__construct($name, $integerPart, $decimalPart);
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        $integerPartLength = $this->integerPartLength();
        $decimalPartLength = $this->decimalPartLength();

        return (
            parent::isValid() &&
            $integerPartLength >= TwelvePositiveIntegerWithTwoDecimal::MIN_ALLOWED_INTEGER_CHARACTERS &&
            $integerPartLength <= TwelvePositiveIntegerWithTwoDecimal::MAX_ALLOWED_INTEGER_CHARACTERS &&
            $decimalPartLength >= TwelvePositiveIntegerWithTwoDecimal::MIN_ALLOWED_DECIMAL_CHARACTERS &&
            $decimalPartLength <= TwelvePositiveIntegerWithTwoDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS
        );
    }

    /**
     * @return int
     */
    public function exactDecimalCharacters(): int
    {
        return self::MAX_ALLOWED_DECIMAL_CHARACTERS;
    }
}
