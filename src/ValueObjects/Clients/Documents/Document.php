<?php

namespace Jibaru\NubefactApi\ValueObjects\Clients\Documents;

use Jibaru\NubefactApi\ValueObjects\Clients\Documents\Exceptions\NotAllowedClientDocument;
use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;

abstract class Document implements Arrayable
{
    public const ALLOWED_TYPE_CHARACTERS = 1;
    public const MAX_VALUE_LENGTH = 15;
    public const MIN_VALUE_LENGTH = 1;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $type;

    /**
     * @var string
     */
    protected string $value;

    /**
     * @param string $name
     * @param string $type
     * @param string $value
     * @throws NotAllowedClientDocument
     */
    public function __construct(string $name, string $type, string $value)
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;

        if (!$this->isValid()) {
            throw new NotAllowedClientDocument();
        }
    }

    /**
     * @return bool
     */
    protected function isValid(): bool
    {
        return (
            $this->isValidType() &&
            $this->isValidValue()
        );
    }

    /**
     * @return bool
     */
    protected function isValidValue(): bool
    {
        $valueLength = $this->valueLength();

        return (
            $valueLength >= Document::MIN_VALUE_LENGTH &&
            $valueLength <= Document::MAX_VALUE_LENGTH
        );
    }

    /**
     * @return bool
     */
    protected function isValidType(): bool
    {
        return $this->typeLength() == Document::ALLOWED_TYPE_CHARACTERS;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * @return int
     */
    protected function typeLength(): int
    {
        return strlen($this->type());
    }

    /**
     * @return int
     */
    protected function valueLength(): int
    {
        return strlen($this->value());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'value' => $this->value,
        ];
    }
}
