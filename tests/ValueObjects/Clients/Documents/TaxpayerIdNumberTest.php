<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Clients\Documents;

use Exception;
use Jibaru\NubefactApi\ValueObjects\Clients\Documents\Exceptions\NotAllowedClientDocument;
use Jibaru\NubefactApi\ValueObjects\Clients\Documents\TaxpayerIdNumber;
use PHPUnit\Framework\TestCase;

class TaxpayerIdNumberTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'Registro Único del Contribuyente';
        $expectedType = '2';
        $expectedValue = '12345678901';

        $document = new TaxpayerIdNumber($expectedValue);
        $this->assertNotNull($document);

        $name = $document->name();
        $value = $document->value();
        $type = $document->type();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedType, $type);
        $this->assertSame($expectedValue, $value);
    }

    /**
     * @test
     */
    public function testValueLengthIsNotEqualsToElevenFails()
    {
        $value = '123456789';

        try {
            new TaxpayerIdNumber($value);
            $this->fail();
        } catch (Exception $exception) {
            $this->assertTrue($exception instanceof NotAllowedClientDocument);
        }
    }
}
