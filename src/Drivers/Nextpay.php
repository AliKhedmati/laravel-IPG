<?php

namespace Alikhedmati\IPG\Drivers;

use Alikhedmati\IPG\Contracts\BaseContract;
use Illuminate\Support\Collection;

class Nextpay extends Driver implements BaseContract
{
    public function getPaymentUrl(): string
    {
        // TODO: Implement getPaymentUrl() method.
    }

    public function verifyPayment(): Collection
    {
        // TODO: Implement verifyPayment() method.
    }
}