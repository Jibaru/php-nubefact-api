<?php

namespace Jibaru\NubefactApi\ValueObjects\Decimals;

use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;

class ThreePositiveIntegerWithFiveDecimal extends Decimal
{
    public const MAX_ALLOWED_INTEGER_CHARACTERS = 3;
    public const MIN_ALLOWED_INTEGER_CHARACTERS = 1;
    public const MAX_ALLOWED_DECIMAL_CHARACTERS = 5;
    public const MIN_ALLOWED_DECIMAL_CHARACTERS = 1;

    /**
     * @param float $value
     * @param string $name
     * @return ThreePositiveIntegerWithFiveDecimal
     * @throws NotAllowedDecimal
     */
    protected static function fromFloat(
        float $value,
        string $name = 'ThreePositiveIntegerWithFiveDecimal'
    ): ThreePositiveIntegerWithFiveDecimal {
        [$integerPart, $decimalPart] = explode(
            '.',
            number_format(
                $value,
                ThreePositiveIntegerWithFiveDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS,
                '.',
                ''
            )
        );

        return new ThreePositiveIntegerWithFiveDecimal(
            $name,
            (int) $integerPart,
            (int) $decimalPart
        );
    }

    /**
     * @param float $value
     * @param string $name
     * @return ThreePositiveIntegerWithFiveDecimal
     * @throws NotAllowedDecimal
     */
    public static function fromFloatRounding(
        float $value,
        string $name = 'ThreePositiveIntegerWithFiveDecimal'
    ): ThreePositiveIntegerWithFiveDecimal {
        return ThreePositiveIntegerWithFiveDecimal::fromFloat(
            round($value, ThreePositiveIntegerWithFiveDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS),
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
            $integerPartLength >= ThreePositiveIntegerWithFiveDecimal::MIN_ALLOWED_INTEGER_CHARACTERS &&
            $integerPartLength <= ThreePositiveIntegerWithFiveDecimal::MAX_ALLOWED_INTEGER_CHARACTERS &&
            $decimalPartLength >= ThreePositiveIntegerWithFiveDecimal::MIN_ALLOWED_DECIMAL_CHARACTERS &&
            $decimalPartLength <= ThreePositiveIntegerWithFiveDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS
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
