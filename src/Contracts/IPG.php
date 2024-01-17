<?php

namespace Alikhedmati\IPG\Contracts;

use Alikhedmati\IPG\DTO\ReceiptData;

interface IPG
{
    public function setBaseUrl(string $baseUrl): static;

    public function setApiKey(string $apiKey): static;

    public function getPaymentUrl(): string;

    public function verifyPayment(): ReceiptData;
}