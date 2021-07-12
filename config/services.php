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

    'facebook' => [
        'client_id' => '403887847605242',
        'client_secret' => '0cc1187f8eb3f0054afe9652cb365fb1',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    
    'google' => [
        'client_id' => '571692121986-dag0ldd3av3c5utvcpuuflimplvuht06.apps.googleusercontent.com',
        'client_secret' => 'QWfL4-V8fVp9Rj8nymqnWVeF',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
