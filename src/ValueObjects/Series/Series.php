<?php

namespace Jibaru\NubefactApi\ValueObjects\Series;

use Jibaru\NubefactApi\ValueObjects\Contracts\Arrayable;
use Jibaru\NubefactApi\ValueObjects\Series\Exceptions\NotAllowedSeries;

abstract class Series implements Arrayable
{
    public const MAX_ALLOWED_CHARACTERS = 4;
    public const MIN_ALLOWED_CHARACTERS = 4;

    /**
     * @var string
     */
    private string $startCharacter;

    /**
     * @var int
     */
    private int $number;

    /**
     * @param string $startCharacter
     * @param int $number
     * @throws NotAllowedSeries
     */
    public function __construct(string $startCharacter, int $number)
    {
        $this->startCharacter = $startCharacter;
        $this->number = $number;

        $length = strlen($this->value());

        if (
            $length > Series::MAX_ALLOWED_CHARACTERS ||
            $length < Series::MIN_ALLOWED_CHARACTERS
        ) {
            throw new NotAllowedSeries();
        }
    }

    public function value(): string
    {
        return $this->startCharacter . $this->number;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'start_character' => $this->startCharacter,
            'number' => $this->number,
        ];
    }
}
