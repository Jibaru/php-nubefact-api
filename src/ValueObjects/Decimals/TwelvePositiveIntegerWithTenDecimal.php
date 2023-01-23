<?php

namespace Jibaru\NubefactApi\ValueObjects\Decimals;

use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;

class TwelvePositiveIntegerWithTenDecimal extends Decimal
{
    public const MAX_ALLOWED_INTEGER_CHARACTERS = 12;
    public const MIN_ALLOWED_INTEGER_CHARACTERS = 1;
    public const MAX_ALLOWED_DECIMAL_CHARACTERS = 10;
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
        string $name = 'TwelvePositiveIntegerWithTenDecimal'
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
            $integerPartLength >= TwelvePositiveIntegerWithTenDecimal::MIN_ALLOWED_INTEGER_CHARACTERS &&
            $integerPartLength <= TwelvePositiveIntegerWithTenDecimal::MAX_ALLOWED_INTEGER_CHARACTERS &&
            $decimalPartLength >= TwelvePositiveIntegerWithTenDecimal::MIN_ALLOWED_DECIMAL_CHARACTERS &&
            $decimalPartLength <= TwelvePositiveIntegerWithTenDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS
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
