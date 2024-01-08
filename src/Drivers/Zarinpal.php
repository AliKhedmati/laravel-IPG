<?php

namespace Alikhedmati\IPG\Drivers;

use Alikhedmati\IPG\Contracts\IPG;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class Zarinpal extends Driver implements IPG
{
    const string BASE_URL = 'https://www.zarinpal.com/pg/rest/WebGate/',
        CREATE_PAYMENT_ENDPOINT = 'PaymentRequest.json',
        VERIFY_PAYMENT_ENDPOINT = 'PaymentVerification.json';

    public function __construct()
    {
        $this->setApiKey(Config::get('IPG.drivers.zarinpal.api-key'));
        $this->setBaseUrl(self::BASE_URL);
    }

    public function getPaymentUrl(): string
    {
        $requestBody = [
            'MerchantID'   =>  $this->apiKey,
            'CallbackURL'  =>  $this->callbackUrl,
            'Amount'    =>  $this->amount
        ];

        if (isset($this->mobile)){
            $requestBody['Mobile'] = $this->getMobile();
        }

        if ($this->description){
            $requestBody['Description'] = $this->getDescription();
        }

        $request = $this->getClient()->post(self::CREATE_PAYMENT_ENDPOINT, [
            'json'  =>  $requestBody,
        ]);    }

    /**
     * @return Collection
     */

    public function verifyPayment(): Collection
    {
        // TODO: Implement verifyPayment() method.
    }
}