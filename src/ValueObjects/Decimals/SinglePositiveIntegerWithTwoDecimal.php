<?php

namespace Jibaru\NubefactApi\ValueObjects\Decimals;

use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;

class SinglePositiveIntegerWithTwoDecimal extends Decimal
{
    public const MAX_ALLOWED_INTEGER_CHARACTERS = 1;
    public const MIN_ALLOWED_INTEGER_CHARACTERS = 1;
    public const MAX_ALLOWED_DECIMAL_CHARACTERS = 2;
    public const MIN_ALLOWED_DECIMAL_CHARACTERS = 1;

    /**
     * @param float $value
     * @param string $name
     * @return SinglePositiveIntegerWithTwoDecimal
     * @throws NotAllowedDecimal
     */
    protected static function fromFloat(
        float $value,
        string $name = 'SinglePositiveIntegerWithTwoDecimal'
    ): SinglePositiveIntegerWithTwoDecimal {
        [$integerPart, $decimalPart] = explode(
            '.',
            number_format(
                $value,
                SinglePositiveIntegerWithTwoDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS,
                '.',
                ''
            )
        );

        return new SinglePositiveIntegerWithTwoDecimal(
            $name,
            (int) $integerPart,
            (int) $decimalPart
        );
    }

    /**
     * @param float $value
     * @param string $name
     * @return SinglePositiveIntegerWithTwoDecimal
     * @throws NotAllowedDecimal
     */
    public static function fromFloatRounding(
        float $value,
        string $name = 'SinglePositiveIntegerWithTwoDecimal'
    ): SinglePositiveIntegerWithTwoDecimal {
        return SinglePositiveIntegerWithTwoDecimal::fromFloat(
            round($value, SinglePositiveIntegerWithTwoDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS),
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
            $integerPartLength >= SinglePositiveIntegerWithTwoDecimal::MIN_ALLOWED_INTEGER_CHARACTERS &&
            $integerPartLength <= SinglePositiveIntegerWithTwoDecimal::MAX_ALLOWED_INTEGER_CHARACTERS &&
            $decimalPartLength >= SinglePositiveIntegerWithTwoDecimal::MIN_ALLOWED_DECIMAL_CHARACTERS &&
            $decimalPartLength <= SinglePositiveIntegerWithTwoDecimal::MAX_ALLOWED_DECIMAL_CHARACTERS
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
