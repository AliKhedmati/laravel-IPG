<?php

namespace Alikhedmati\IPG\Contracts;

use Illuminate\Support\Collection;

interface BaseContract
{
    public function setBaseUrl(string $baseUrl): static;

    public function setApiKey(string $apiKey): static;

    public function getPaymentUrl(): string;

    public function verifyPayment(): Collection;
}