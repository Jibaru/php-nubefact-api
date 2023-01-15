<?php

namespace Jibaru\NubefactApi\ValueObjects\Series;

use Jibaru\NubefactApi\ValueObjects\Series\Exceptions\NotAllowedSeries;

class InvoiceSeries extends Series
{
    public const START_CHARACTER = 'F';

    /**
     * @param int $number
     * @throws NotAllowedSeries
     */
    public function __construct(int $number)
    {
        parent::__construct(InvoiceSeries::START_CHARACTER, $number);
    }
}
