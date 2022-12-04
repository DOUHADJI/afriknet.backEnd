<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => [
        'api/*', 'sanctum/csrf-cookie', 'register', 'login', "user", 
        'logout', 'update', 'offers', 'send_request', 'send_complaint', 
        'get_lastest_complaint', 'subscribe_offer', 'current_subscription', 'subscriptions_history'
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [env('FRONTEND_URL')],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
