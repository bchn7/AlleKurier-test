<?php

namespace App\Core\Invoice\Application\Query\GetInvoicesByStatusAndAmountGreater;

class GetInvoicesByStatusAndAmountGreaterQuery
{
    public function __construct(public readonly string $status, public readonly int $amount)
    {
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}
