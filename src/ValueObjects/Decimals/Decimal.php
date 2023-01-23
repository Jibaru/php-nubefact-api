<?php

namespace Jibaru\NubefactApi\ValueObjects\Decimals;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Contracts\Validatable;
use Jibaru\NubefactApi\ValueObjects\Decimals\Exceptions\NotAllowedDecimal;

abstract class Decimal implements Arrayable, Validatable
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var int
     */
    protected int $integerPart;

    /**
     * @var int
     */
    protected int $decimalPart;

    /**
     * @param string $name
     * @param int $integerPart
     * @param int $decimalPart
     * @throws NotAllowedDecimal
     */
    public function __construct(string $name, int $integerPart, int $decimalPart)
    {
        $this->name = $name;
        $this->integerPart = $integerPart;
        $this->decimalPart = $decimalPart;

        if (!$this->isValid()) {
            throw new NotAllowedDecimal();
        }
    }

    /**
     * @return int
     */
    abstract protected function exactDecimalCharacters(): int;

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    protected function integerPart(): int
    {
        return $this->integerPart;
    }

    /**
     * @return int
     */
    protected function decimalPart(): int
    {
        return $this->decimalPart;
    }

    /**
     * @return int
     */
    protected function integerPartLength(): int
    {
        return strlen((string) $this->integerPart());
    }

    /**
     * @return int
     */
    protected function decimalPartLength(): int
    {
        return strlen((string) $this->decimalPart());
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return "{$this->integerPart()}.{$this->decimalPartAsString()}";
    }

    /**
     * @return string
     */
    public function decimalPartAsString(): string
    {
        return str_pad(
            $this->decimalPart(),
            $this->exactDecimalCharacters(),
            '0'
        );
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return (
            $this->integerPart() >= 0 &&
            $this->decimalPart() >= 0
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name(),
            'value' => $this->value(),
        ];
    }
}
