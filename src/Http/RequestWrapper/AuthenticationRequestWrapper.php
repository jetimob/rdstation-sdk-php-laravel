<?php

namespace Jetimob\RDStation\Http\RequestWrapper;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Illuminate\Contracts\Container\BindingResolutionException;
use Jetimob\Http\Request;
use Psr\SimpleCache\InvalidArgumentException;
use RuntimeException;

/**
 * Class AuthenticationRequestWrapper
 * @package Jetimob\RDStation\Http\RequestWrapper
 * @link https://developers.rdstation.com/en/authentication
 */
class AuthenticationRequestWrapper extends RequestWrapper
{
    /**
     * Revokes an access token.
     * @return Response
     * @throws BindingResolutionException
     * @throws InvalidArgumentException
     */
    public function revoke(): Response
    {
        $oAuth = $this->http->oAuth();
        $client = $oAuth->getClient();
        $accessToken = $oAuth->getCachedAccessToken($client);

        if (is_null($accessToken) || is_null($accessToken->getRefreshToken())) {
            throw new RuntimeException('There is no access token to be revoked');
        }

        return $this->http->send(new Request('post', '/auth/revoke'), [
            RequestOptions::JSON => [
                'token' => $accessToken->getRefreshToken(),
                'token_type_hint' => 'refresh_token',
            ],
        ]);
    }
}