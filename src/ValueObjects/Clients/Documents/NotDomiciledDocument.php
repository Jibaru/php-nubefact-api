<?php

namespace Jibaru\NubefactApi\ValueObjects\Clients\Documents;

use Jibaru\NubefactApi\ValueObjects\Clients\Documents\Exceptions\NotAllowedClientDocument;

class NotDomiciledDocument extends Document
{
    /**
     * @param string $value
     * @throws NotAllowedClientDocument
     */
    public function __construct(string $value)
    {
        parent::__construct(
            'No domiciliado, sin RUC (EXPORTACIÓN)',
            '0',
            $value
        );
    }
}
