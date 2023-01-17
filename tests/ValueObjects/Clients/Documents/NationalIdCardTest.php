<?php

namespace Jibaru\NubefactApi\Tests\ValueObjects\Clients\Documents;

use Exception;
use Jibaru\NubefactApi\ValueObjects\Clients\Documents\Exceptions\NotAllowedClientDocument;
use Jibaru\NubefactApi\ValueObjects\Clients\Documents\NationalIdCard;
use PHPUnit\Framework\TestCase;

class NationalIdCardTest extends TestCase
{
    /**
     * @test
     */
    public function testNewInstance()
    {
        $expectedName = 'Documento Nacional de Identidad';
        $expectedType = '1';
        $expectedValue = '03456701';

        $nationalIdCard = new NationalIdCard($expectedValue);
        $this->assertNotNull($nationalIdCard);

        $name = $nationalIdCard->name();
        $value = $nationalIdCard->value();
        $type = $nationalIdCard->type();

        $this->assertSame($expectedName, $name);
        $this->assertSame($expectedType, $type);
        $this->assertSame($expectedValue, $value);
    }

    /**
     * @test
     */
    public function testValueLengthIsNotEqualsToEigthFails()
    {
        $value = '123456789';

        try {
            new NationalIdCard($value);
            $this->fail();
        } catch (Exception $exception) {
            $this->assertTrue($exception instanceof NotAllowedClientDocument);
        }
    }
}
