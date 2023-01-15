<?php

namespace Jibaru\NubefactApi\ValueObjects\Series;

use Jibaru\NubefactApi\ValueObjects\Series\Exceptions\NotAllowedSeries;

class ReceiptSeries extends Series
{
    public const START_CHARACTER = 'B';

    /**
     * @param int $number
     * @throws NotAllowedSeries
     */
    public function __construct(int $number)
    {
        parent::__construct(ReceiptSeries::START_CHARACTER, $number);
    }
}
