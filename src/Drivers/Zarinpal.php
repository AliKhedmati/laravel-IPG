<?php

namespace Alikhedmati\IPG\Drivers;

use Alikhedmati\IPG\Contracts\IPG;
use Alikhedmati\IPG\DTO\ReceiptData;
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
            $requestBody['Mobile'] = $this->mobile;
        }

        if (isset($this->description)){
            $requestBody['Description'] = $this->description;
        }

        $request = $this->getClient()->post(self::CREATE_PAYMENT_ENDPOINT, [
            'json'  =>  $requestBody,
        ]);
    }

    /**
     * @return ReceiptData
     */

    public function verifyPayment(): ReceiptData
    {
        // TODO: Implement verifyPayment() method.
    }
}