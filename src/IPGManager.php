<?php

namespace Alikhedmati\IPG;

use Alikhedmati\IPG\Drivers\Nextpay;
use Alikhedmati\IPG\Drivers\Vandar;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Manager;

class IPGManager extends Manager
{
    /**
     * @return Nextpay
     */

    public function createNextpayDriver(): Nextpay
    {
        return new Nextpay();
    }

    /**
     * @return Vandar
     */

    public function createVandarDriver(): Vandar
    {
        return new Vandar();
    }

    /**
     * @return string
     */

    public function getDefaultDriver(): string
    {
        return Config::get('IPG.default-driver');
    }
}