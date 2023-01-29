<?php

namespace Jibaru\NubefactApi\Tests\ObjectMothers\ValueObjects\Perceptions\Types;

use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\FuelAcquisition;
use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\InternalSale;
use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\MadeToPerceptionAgent;
use Jibaru\NubefactApi\ValueObjects\Perceptions\Types\Type;

class TypeExamples
{
    /**
     * @return Type
     */
    public function random(): Type
    {
        $default = new MadeToPerceptionAgent();

        try {
            $position = random_int(0, 2);

            switch ($position) {
                case 0:
                    return new FuelAcquisition();
                case 1:
                    return new InternalSale();
                default:
                    return $default;
            }
        } catch (\Exception $exception) {
            return $default;
        }
    }
}
