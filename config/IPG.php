<?php

return [
    'default-driver'    =>  env('IPG_DRIVER'),
    'drivers'   =>  [
        'nextpay'   =>  [
            'api-key'   =>  env('IPG_NEXTPAY_API_KEY')
        ],
        'vandar'    =>  [
            'api-key'   =>  env('IPG_VANDAR_API_KEY')
        ],
    ],
];