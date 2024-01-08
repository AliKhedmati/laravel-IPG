<?php

namespace Alikhedmati\IPG\Drivers;

use GuzzleHttp\Client;

class Driver
{
    /**
     * @var string
     */

    protected string $baseUrl;

    /**
     * @var string
     */

    protected string $apiKey;

    /**
     * @var string
     */

    protected string $callbackUrl;

    /**
     * @var string
     */

    protected string $mobile;

    /**
     * @var string
     */

    protected string $amount;

    /**
     * @var string
     */

    protected string $description;

    /**
     * @param string $baseUrl
     * @return $this
     */

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @param string $apiKey
     * @return $this
     */

    public function setApiKey(string $apiKey): static
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @param string $amount
     * @return Driver
     */

    public function setAmount(string $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $callbackUrl
     * @return Driver
     */

    public function setCallbackUrl(string $callbackUrl): static
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    /**
     * @param string $mobile
     * @return Driver
     */

    public function setMobile(string $mobile): static
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * @param string $description
     * @return Driver
     */

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param array $headers
     * @return Client
     */

    protected function getClient(array $headers = []): Client
    {
        $headers = collect($headers)->merge([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->toArray();

        return new Client([
            'base_uri'  =>  $this->baseUrl,
            'headers'   =>  $headers,
            'http_errors'   =>  false
        ]);
    }
}