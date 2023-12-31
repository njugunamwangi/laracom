<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'viva' => [
        'api_key' => env('VIVA_API_KEY'),
        'merchant_id' => env('VIVA_MERCHANT_ID'),
        'environment' => env('VIVA_ENVIRONMENT', 'production'),
        'client_id' => env('VIVA_CLIENT_ID'),
        'client_secret' => env('VIVA_CLIENT_SECRET'),
        'isv_partner_id' => env('VIVA_ISV_PARTNER_ID'),
        'isv_partner_api_key' => env('VIVA_ISV_PARTNER_API_KEY'),
    ],

];
