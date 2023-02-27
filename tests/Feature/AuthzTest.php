<?php

namespace Jetimob\RDStation\Tests\Feature;

use Jetimob\Http\Authorization\OAuth\AccessToken;
use Jetimob\RDStation\Facades\RDStation;
use Jetimob\RDStation\Tests\AbtractTestCase;

class AuthzTest extends AbtractTestCase
{
    /** @test */
    public function handleCode(): void
    {
        $at = RDStation::getHttpInstance()->oAuth()->handleAuthorizationCodeExchange('');
        $this->assertInstanceOf(AccessToken::class, $at);
    }
}
