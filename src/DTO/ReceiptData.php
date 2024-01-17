<?php

namespace Alikhedmati\IPG\DTO;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ReceiptData extends Data
{

    /**
     * @param bool $isVerified
     * @param string|Optional $ref
     * @param Collection|Optional $payment
     */

    public function __construct(
        public bool $isVerified,
        public string|Optional $ref,
        public Collection|Optional $payment
    ) {}
}