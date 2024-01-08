<?php

namespace Alikhedmati\IPG\Drivers;

use Alikhedmati\IPG\Contracts\IPG;
use Illuminate\Support\Collection;

class Nextpay extends Driver implements IPG
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