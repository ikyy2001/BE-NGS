<?php

$frontendUrl = env('FRONTEND_URL', '*');
$allowedOrigins = array_filter(array_map('trim', explode(',', $frontendUrl)));

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Configure CORS settings for the public REST API endpoints.
    | Origins are dynamically read from the FRONTEND_URL environment variable.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'storage/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ! empty($allowedOrigins) ? array_values($allowedOrigins) : ['*'],

    'allowed_origins_patterns' => [
        '#^https?://(.*\.)?nusagarudastudio\.com$#',
        '#^https?://(.*\.)?nusagarudastudio\.my\.id$#',
        '#^http://localhost:\d+$#',
        '#^http://127\.0\.0\.1:\d+$#',
    ],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];


