<?php

return [
    'http' => [
        // how many retries before we actually throw an exception?
        'retries' => 2,
        // on which status code we should consider retrying the request?
        'retry_on_status_code' => [500],
        // before retrying a failed request, wait for the specified amount of time, in milliseconds
        'retry_delay' => 2000,

        'oauth_client_id' => env('RDSTATION_OAUTH_CLIENT_ID'),
        'oauth_client_secret' => env('RDSTATION_OAUTH_CLIENT_SECRET'),
        'oauth_authorization_uri' => env('RDSTATION_OAUTH_AUTHORIZATION_URI'),
        'oauth_token_uri' => env('RDSTATION_OAUTH_TOKEN_URI'),

        'guzzle' => [
            'base_uri' => 'https://api.rd.services',

            // Number of seconds to wait while trying to connect to a server. 0 waits indefinitely.
            'connect_timeout' => 0.0,

            // Time needed to throw a timeout exception after a request is made.
            'timeout' => 0.0,

            // Set this to true if you want to debug the request/response.
            'debug' => false,

            'middlewares' => [
                \Jetimob\Http\Middlewares\OAuthRequestMiddleware::class,
            ],
        ],

        // class
        'oauth_token_cache_key_resolver' => \Jetimob\Http\OAuth\Storage\AccessTokenCacheKeyResolver::class,

        'oauth_client_provider' => \Jetimob\Http\OAuth\ClientProviders\OAuthClientResolver::class,

        'oauth_access_token_resolver' => [
            \Jetimob\Http\OAuth\OAuthFlow::CLIENT_CREDENTIALS =>
                \Jetimob\Http\OAuth\TokenResolvers\OAuthClientCredentialsTokenResolver::class,
            \Jetimob\Http\OAuth\OAuthFlow::AUTHORIZATION_CODE =>
                \Jetimob\Http\OAuth\TokenResolvers\OAuthAuthorizationCodeTokenResolver::class,
        ],

    ],
];
