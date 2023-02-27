<?php

declare(strict_types=1);

return [
    'http' => [
        'oauth_client_id' => env('RDSTATION_OAUTH_CLIENT_ID'),
        'oauth_client_secret' => env('RDSTATION_OAUTH_CLIENT_SECRET'),
        'oauth_authorization_uri' => env('RDSTATION_OAUTH_AUTHORIZATION_URI'),
        'oauth_token_uri' => env('RDSTATION_OAUTH_TOKEN_URI', 'https://api.rd.services/auth/token'),

        /*
        |--------------------------------------------------------------------------
        | Retries
        |--------------------------------------------------------------------------
        |
        | Quantas vezes uma requisição pode ser reexecutada (em caso de falha) antes de gerar uma exceção.
        |
        */

        'retries' => 0,

        /*
        |--------------------------------------------------------------------------
        | Retry On Status Code
        |--------------------------------------------------------------------------
        |
        | Em quais códigos HTTP de uma resposta falha podemos tentar reexecutar a requisição.
        |
        */

        'retry_on_status_code' => [401],

        /*
        |--------------------------------------------------------------------------
        | Retry Delay
        |--------------------------------------------------------------------------
        |
        | Antes de tentar reexecutar uma requisição falha, aguardar em ms.
        |
        */

        'retry_delay' => 2000,

        /*
        |--------------------------------------------------------------------------
        | Guzzle
        |--------------------------------------------------------------------------
        |
        | Configurações passadas à instância do Guzzle.
        | @link https://docs.guzzlephp.org/en/stable/request-options.html
        |
        */

        'guzzle' => [
            'base_uri' => 'https://api.rd.services',

            /*
            |--------------------------------------------------------------------------
            | Connect Timeout
            |--------------------------------------------------------------------------
            |
            | Quantos segundos esperar por uma conexão HTTP. 0 significa sem limite de espera.
            | https://docs.guzzlephp.org/en/stable/request-options.html#connect-timeout
            |
            */

            'connect_timeout' => 10.0,

            /*
            |--------------------------------------------------------------------------
            | Timeout
            |--------------------------------------------------------------------------
            |
            | Quantos segundos esperar pela resposta do servidor. 0 significa sem limite de espera.
            | @link https://docs.guzzlephp.org/en/stable/request-options.html#timeout
            |
            */

            'timeout' => 0.0,

            /*
            |--------------------------------------------------------------------------
            | Debug
            |--------------------------------------------------------------------------
            |
            | Usar true para ativar o modo debug do Guzzle.
            | @link https://docs.guzzlephp.org/en/stable/request-options.html#debug
            |
            */

            'debug' => false,

            /*
            |--------------------------------------------------------------------------
            | Middlewares
            |--------------------------------------------------------------------------
            |
            | @link https://docs.guzzlephp.org/en/stable/handlers-and-middleware.html#middleware
            |
            */

            'middlewares' => [
                \Jetimob\Http\Middlewares\OAuthRequestMiddleware::class,
            ],

            /*
            |--------------------------------------------------------------------------
            | Headers
            |--------------------------------------------------------------------------
            |
            | Headers de requisição.
            | @link https://docs.guzzlephp.org/en/stable/request-options.html#headers
            |
            */

            'headers' => [
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | OAuth Access Token Repository
        |--------------------------------------------------------------------------
        |
        | Essa classe é responsável por gerenciar os AccessTokens. Por padrão ela utiliza o repositório de cache padrão.
        |
        | PRECISA implementar \Jetimob\Http\Authorization\OAuth\Storage\CacheRepositoryContract
        */

        'oauth_access_token_repository' => \Jetimob\Http\Authorization\OAuth\Storage\CacheRepository::class,

        /*
        |--------------------------------------------------------------------------
        | OAuth Token Cache Key Resolver
        |--------------------------------------------------------------------------
        |
        | Classe responsável por gerar uma chave de identificação única para o cliente OAuth.
        |
        | PRECISA implementar \Jetimob\Http\Authorization\OAuth\Storage\AccessTokenCacheKeyResolverInterface
        */

        'oauth_token_cache_key_resolver' =>
            \Jetimob\Http\Authorization\OAuth\Storage\AccessTokenCacheKeyResolver::class,

        /*
        |--------------------------------------------------------------------------
        | OAuth Client Resolver
        |--------------------------------------------------------------------------
        |
        | Classe responsável por resolver o client OAuth.
        |
        | PRECISA implementar \Jetimob\Http\Authorization\OAuth\ClientProviders\OAuthClientResolverInterface
        */

        'oauth_client_resolver' => \Jetimob\Http\Authorization\OAuth\ClientProviders\OAuthClientResolver::class,

        'oauth_access_token_resolver' => [
            \Jetimob\Http\Authorization\OAuth\OAuthFlow::AUTHORIZATION_CODE =>
                \Jetimob\RDStation\Http\Authorization\OAuth\TokenResolver\RDStationTokenResolver::class,
        ],
    ],

    'api_impl' => [
        'webhook' => \Jetimob\RDStation\Api\Webhook\WebhookApi::class,
        'customFields' => \Jetimob\RDStation\Api\CustomFields\CustomFieldsApi::class,
    ],
];
