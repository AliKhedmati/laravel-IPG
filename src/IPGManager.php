<?php

namespace Alikhedmati\IPG;

use Alikhedmati\IPG\Drivers\Nextpay;
use Alikhedmati\IPG\Drivers\Vandar;
use Alikhedmati\IPG\Drivers\Zarinpal;
use Alikhedmati\IPG\Drivers\Zibal;
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
     * @return Zarinpal
     */

    public function createZarinpalDriver(): Zarinpal
    {
        return new Zarinpal();
    }

    /**
     * @return Zibal
     */

    public function createZibalDriver(): Zibal
    {
        return new Zibal();
    }

    /**
     * @return string
     */

    public function getDefaultDriver(): string
    {
        return Config::get('IPG.default-driver');
    }
}