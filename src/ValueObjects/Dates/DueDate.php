<?php

namespace Jibaru\NubefactApi\ValueObjects\Dates;

use DateTime;
use Jibaru\NubefactApi\ValueObjects\Contracts\Validatable;
use Jibaru\NubefactApi\ValueObjects\Dates\Exceptions\NotAllowedDate;

class DueDate extends Date implements Validatable
{
    /**
     * @var Date|null
     */
    protected ?Date $issueDate;

    /**
     * @param DateTime $value
     * @param Date|null $issueDate
     * @throws NotAllowedDate
     */
    public function __construct(DateTime $value, ?Date $issueDate = null)
    {
        parent::__construct($value);

        $this->issueDate = $issueDate;

        if (!$this->isValid()) {
            throw new NotAllowedDate();
        }
    }

    /**
     * @return bool
     */
    public function hasIssueDate(): bool
    {
        return isset($this->issueDate);
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        if ($this->hasIssueDate()) {
            return $this->issueDate < $this->value();
        }

        return true;
    }
}
