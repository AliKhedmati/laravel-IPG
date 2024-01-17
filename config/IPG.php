<?php

return [
    'default-driver'    =>  env('IPG_DRIVER'),
    'drivers'   =>  [
        'zarinpal'  =>  [
            'api-key'   =>  env('IPG_ZARINPAL_API_KEY')
        ],
        'vandar'    =>  [
            'api-key'   =>  env('IPG_VANDAR_API_KEY')
        ],
        'zibal'    =>  [
            'api-key'   =>  env('IPG_ZIBAL_API_KEY')
        ],
    ],
];