<?php

namespace Alikhedmati\IPG\Facades;

use Illuminate\Support\Facades\Facade;

class IPG extends Facade
{
    /**
     * @return string
     */

    protected static function getFacadeAccessor(): string
    {
        return 'IPG';
    }
}