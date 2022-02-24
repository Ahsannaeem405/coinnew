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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    'google' => [
        'client_id' => '973317787439-vgfma0ohnmhtg78tmr10id5kos8bp4v8.apps.googleusercontent.com',
        'client_secret' => 'wwf40k9Ko3cA4MIttJHbpvto',
        'redirect' => 'https://www.coinhype.to/auth/google/callback',
    ],
     'facebook' => [
        'client_id' => '1211244322633040',
        'client_secret' => '017faf9e64ace884cdce2bbaf6625458',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
      ],

];
