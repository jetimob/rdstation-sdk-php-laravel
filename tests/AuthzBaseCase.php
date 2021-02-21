<?php

namespace Jetimob\RDStation\Tests;

//use Jetimob\Http\Cache\CacheRepository;
//use Jetimob\Http\Facade\JHttp;
//use Jetimob\Http\OAuth\Requests\OAuthAccessTokenResponse;
//use Jetimob\Http\Tests\Feature\OAuth\Requests\RDStationResponseError;

use Jetimob\Http\OAuth\AccessToken;
use Jetimob\Http\OAuth\OAuthClient;
use Jetimob\RDStation\Facade\Http;

abstract class AuthzBaseCase extends TestCase
{
//    private CacheRepository $cacheRepository;
//    protected OAuthAccessTokenResponse $accessToken;

    protected AccessToken $accessToken;
    protected OAuthClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->accessToken = new AccessToken([
            'access_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5yZC5zZXJ2aWNlcyIsInN1YiI6IkhNVGJnNW5kM1JWRVBxY2xObzBEZF83VnZmRk5icjNyeUtLN2I5aldMNklAY2xpZW50cyIsImF1ZCI6Imh0dHBzOi8vYXBwLnJkc3RhdGlvbi5jb20uYnIvYXBpL3YyLyIsImFwcF9uYW1lIjoid3d3LWludC10ZXN0IiwiZXhwIjoxNjEzNTI2ODM0LCJpYXQiOjE2MTM0NDA0MzQsInNjb3BlIjoiIn0.Xtiq0czQsxIGOGSJf2dRjSdr5PETTEEqf28mUqljDhwhB3adI0lhtXLJpBDf4XfoXWbLr9qyhZ2R4ABWAzulmsSvkLZ5kn23kwjxoUIQkzWOF4NBKrCEynNrYORAZ2BpTK-n4g7cYGs4N5rHv_rQ0CEZnS3lRLGZm9D7Pf_dfQhrtVB450ldW_IoryBr9cAYNhdRR26ScGB3Bo3TBQoAuLDhUwvTYdsrlbq9iDHx_E4dYrIwwGrJXIQG9JurEfpreqzk2wvte5yDdrQd-NUkf2JS25cqe23Db9p_WW4N3r2AkBdyTLG26mpTKujPj-bAefd65vra08q6xhkuw1IN9w',
            'refresh_token' => 'PQiz5TP7RbkGf9OtCNWYhV0JKR-tRfCYOMiNDeh1Q30',
            'expires_in' => '86400',
            'generated_at' => '1613440444',
        ]);

        $this->client = new OAuthClient(
            env('OAUTH_CLIENT_ID'),
            env('OAUTH_CLIENT_SECRET'),
            env('OAUTH_TOKEN_URI'),
            env('OAUTH_AUTHORIZATION_URI'),
        );

        Http::oAuth()->storeAccessToken($this->accessToken);
    }

    /** @test */
    public function exchange_authorization_code(): void
    {
        $response = Http::oAuth()->handleAuthorizationCodeExchange('73245fbbd7f1104af38657c85b0508cd');
        self::assertNotEmpty($response);
        print_r($response);
    }
}
