<?php

$frontendUrl = env('FRONTEND_URL', 'http://localhost:4321');
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

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ! empty($allowedOrigins) ? array_values($allowedOrigins) : ['http://localhost:4321'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
