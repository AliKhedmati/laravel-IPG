<?php

namespace Alikhedmati\IPG\Drivers;

use Alikhedmati\IPG\Contracts\IPG;
use Alikhedmati\IPG\Drivers\Driver;
use Alikhedmati\IPG\Exceptions\IPGRequestPaymentFailed;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class Vandar extends Driver implements IPG
{
    const string
        BASE_URI = 'https://ipg.vandar.io/',
        CREATE_PAYMENT_ENDPOINT = 'api/v3/send',
        REDIRECT_USER_PAYMENT_BASE_URI = 'v3/',
        VERIFY_PAYMENT_ENDPOINT = 'api/v3/verify';

    public function __construct()
    {
        $this->setBaseUrl(self::BASE_URI);
        $this->setApiKey(Config::get('settings.vandar-api-key'));
    }

    /**
     * @return string
     * @throws GuzzleException
     * @throws IPGRequestPaymentFailed
     */

    public function getPaymentUrl(): string
    {
        $requestBody = [
            'api_key'   =>  $this->apiKey,
            'callback_url'  =>  $this->callbackUrl,
        ];

        if (isset($this->amount)){
            $requestBody['amount'] = $this->amount * 10;
        }

        if (isset($this->mobile)){
            $requestBody['mobile_number'] = $this->mobile;
        }

        if ($this->description){
            $requestBody['description'] = $this->description;
        }

        $request = $this->getClient()->post(self::CREATE_PAYMENT_ENDPOINT, [
            'json'  =>  $requestBody,
        ]);

        if ($request->getStatusCode() != 200){

            $request = json_decode($request->getBody()->getContents());

            throw new IPGRequestPaymentFailed($request->errors[0]);

        }

        $request = json_decode($request->getBody()->getContents());

        return $this->baseUrl . self::REDIRECT_USER_PAYMENT_BASE_URI . $request->token;
    }

    /**
     * @return Collection
     */

    public function verifyPayment(): Collection
    {
        $requestBody = [
            'api_key'   =>  $this->apiKey,
            'token'  =>  $token,
        ];

        $request = $this->getClient()->post(self::VERIFY_PAYMENT_ENDPOINT, [
            'json'  =>  $requestBody,
        ]);

        if ($request->getStatusCode() != 200) {

            $request = json_decode($request->getBody()->getContents());

            throw new PaymentCreationFailed($request->errors[0]);

        }

        $payment = collect(json_decode($request->getBody()->getContents()));

        if ($payment->has('status') && $payment->get('status') == 1){

            $payment = $payment->merge([
                'internal_status'   =>  true,
                'gateway_ref'   =>  $payment->get('transId')
            ]);

        }

        return $payment;    }
}