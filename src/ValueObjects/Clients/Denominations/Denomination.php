<?php

namespace Jibaru\NubefactApi\ValueObjects\Clients\Denominations;

use Jibaru\NubefactApi\ValueObjects\Clients\Denominations\Exceptions\NotAllowedDenomination;
use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Contracts\Validatable;

class Denomination implements Arrayable, Validatable
{
    public const MAX_ALLOWED_CHARACTERS = 100;
    public const MIN_ALLOWED_CHARACTERS = 1;

    /**
     * @var string
     */
    protected string $value;

    /**
     * @param string $value
     * @throws NotAllowedDenomination
     */
    public function __construct(string $value)
    {
        $this->value = $value;

        if (!$this->isValid()) {
            throw new NotAllowedDenomination();
        }
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        $valueLength = strlen($this->value());

        return (
            $valueLength <= Denomination::MAX_ALLOWED_CHARACTERS &&
            $valueLength >= Denomination::MIN_ALLOWED_CHARACTERS
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'value' => $this->value(),
        ];
    }
}
