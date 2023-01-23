<?php

namespace Jibaru\NubefactApi\ValueObjects\Decimals;

use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;

class TwoPositiveIntegerWithTwoDecimal extends Decimal
{
    public const MAX_ALLOWED_INTEGER_CHARACTERS = 2;
    public const MIN_ALLOWED_INTEGER_CHARACTERS = 1;
    public const MAX_ALLOWED_DECIMAL_CHARACTERS = 2;
    public const MIN_ALLOWED_DECIMAL_CHARACTERS = 1;

    /**
     * @param float $value
     * @param string $name
     * @return TwoPositiveIntegerWithTwoDecimal
     * @throws NotAllowedDecimal
     */
    protected static function fromFloat(
        float $value,
        string $name = 'TwoPositiveIntegerWithTwoDecimal'
    ): TwoPositiveIntegerWithTwoDecimal {
        [$integerPart, $decimalPart] = explode(
            '.',
            number_format(
                $value,
                TwoPositiveIntegerWithTwoDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS,
                '.',
                ''
            )
        );

        return new TwoPositiveIntegerWithTwoDecimal(
            $name,
            (int) $integerPart,
            (int) $decimalPart
        );
    }


    /**
     * @param float $value
     * @param string $name
     * @return TwoPositiveIntegerWithTwoDecimal
     * @throws NotAllowedDecimal
     */
    public static function fromFloatRounding(
        float $value,
        string $name = 'TwoPositiveIntegerWithTwoDecimal'
    ): TwoPositiveIntegerWithTwoDecimal {
        return TwoPositiveIntegerWithTwoDecimal::fromFloat(
            round($value, TwoPositiveIntegerWithTwoDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS),
            $name
        );
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
            $integerPartLength >= TwoPositiveIntegerWithTwoDecimal::MIN_ALLOWED_INTEGER_CHARACTERS &&
            $integerPartLength <= TwoPositiveIntegerWithTwoDecimal::MAX_ALLOWED_INTEGER_CHARACTERS &&
            $decimalPartLength >= TwoPositiveIntegerWithTwoDecimal::MIN_ALLOWED_DECIMAL_CHARACTERS &&
            $decimalPartLength <= TwoPositiveIntegerWithTwoDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS
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
