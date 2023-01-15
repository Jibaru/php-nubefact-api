<?php

namespace Jibaru\NubefactApi\ValueObjects\Series;

use Jibaru\NubefactApi\ValueObjects\Series\Exceptions\NotAllowedSeries;

class ContingencySeries extends Series
{
    public const START_CHARACTER = '0';

    /**
     * @param int $number
     * @throws NotAllowedSeries
     */
    public function __construct(int $number)
    {
        parent::__construct(ContingencySeries::START_CHARACTER, $number);
    }
}
