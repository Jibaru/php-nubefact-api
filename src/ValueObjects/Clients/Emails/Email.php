<?php

namespace Jibaru\NubefactApi\ValueObjects\Clients\Emails;

use Jibaru\NubefactApi\ValueObjects\Clients\Emails\Exceptions\NotAllowedEmail;
use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Contracts\Validatable;

class Email implements Arrayable, Validatable
{
    public const MAX_ALLOWED_CHARACTERS = 250;
    public const MIN_ALLOWED_CHARACTERS = 1;

    /**
     * @var string
     */
    protected string $value;

    /**
     * @param string $value
     * @throws NotAllowedEmail
     */
    public function __construct(string $value)
    {
        $this->value = $value;

        if (!$this->isValid()) {
            throw new NotAllowedEmail();
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
            $valueLength <= Email::MAX_ALLOWED_CHARACTERS &&
            $valueLength >= Email::MIN_ALLOWED_CHARACTERS &&
            filter_var($this->value(), FILTER_VALIDATE_EMAIL)
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
