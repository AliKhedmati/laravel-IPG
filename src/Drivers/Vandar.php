<?php

namespace Alikhedmati\IPG\Drivers;

use Alikhedmati\IPG\Contracts\IPG;
use Alikhedmati\IPG\Drivers\Driver;
use Illuminate\Support\Collection;

class Vandar extends Driver implements IPG
{
    /**
     * @return string
     */

    public function getPaymentUrl(): string
    {
        // TODO: Implement getPaymentUrl() method.
    }

    /**
     * @return Collection
     */

    public function verifyPayment(): Collection
    {
        // TODO: Implement verifyPayment() method.
    }
}