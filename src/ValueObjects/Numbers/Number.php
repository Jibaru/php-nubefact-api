<?php

namespace Jibaru\NubefactApi\ValueObjects\Numbers;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Contracts\Validatable;
use Jibaru\NubefactApi\ValueObjects\Numbers\Exceptions\NotAllowedNumber;

class Number implements Arrayable, Validatable
{
    public const MAX_ALLOWED_CHARACTERS = 8;
    public const MIN_ALLOWED_CHARACTERS = 1;

    /**
     * @var int
     */
    private int $number;

    /**
     * @param int $number
     * @throws NotAllowedNumber
     */
    public function __construct(int $number)
    {
        $this->number = $number;

        if (!$this->isValid()) {
            throw new NotAllowedNumber();
        }
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->number;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        $valueLength = $this->valueLength();

        return (
            $valueLength > Number::MAX_ALLOWED_CHARACTERS ||
            $valueLength < Number::MIN_ALLOWED_CHARACTERS
        );
    }

    /**
     * @return int
     */
    private function valueLength(): int
    {
        return strlen((string) $this->value());
    }

    /**
     * @return int[]
     */
    public function toArray(): array
    {
        return [
            'number' => $this->number,
        ];
    }
}
