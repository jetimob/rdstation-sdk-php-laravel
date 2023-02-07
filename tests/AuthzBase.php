<?php

namespace Jetimob\RDStation\Tests;

use Jetimob\Http\Authorization\OAuth\AccessToken;
use Jetimob\RDStation\Facade\RDStation;

class AuthzBase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $at = new AccessToken([
            'access_token' => '',
            'refresh_token' => '',
            'expires_in' => '',
            'generated_at' => '',
        ]);

        RDStation::getHttpClient()->overwriteConfig(
            'oauth_access_token_repository',
            \Jetimob\Http\Authorization\OAuth\Storage\FileCacheRepository::class,
        );

        RDStation::getOAuthHandler()->storeAccessToken($at);
    }
//
//    /** @test */
//    public function exchange_authorization_code(): void
//    {
//        $response = RDStation::handleAuthorizationCodeExchange('');
//        self::assertNotEmpty($response);
//    }
}
