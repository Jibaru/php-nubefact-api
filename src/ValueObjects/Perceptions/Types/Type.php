<?php

namespace Jibaru\NubefactApi\ValueObjects\Perceptions\Types;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Contracts\Validatable;
use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\Exceptions\NotAllowedType;

abstract class Type implements Arrayable, Validatable
{
    public const MAX_VALUE_CHARACTERS = 1;
    public const MIN_VALUE_CHARACTERS = 1;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var int
     */
    protected int $value;

    /**
     * @param string $name
     * @param int $value
     * @throws NotAllowedType
     */
    public function __construct(string $name, int $value)
    {
        $this->name = $name;
        $this->value = $value;

        if (!$this->isValid()) {
            throw new NotAllowedType();
        }
    }

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
    public function value(): int
    {
        return $this->value;
    }

    /**
     * @return int
     */
    protected function valueLength(): int
    {
        return strlen((string) $this->value());
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return (
            $this->valueLength() >= Type::MIN_VALUE_CHARACTERS &&
            $this->valueLength() <= Type::MAX_VALUE_CHARACTERS
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
