<?php

namespace Jetimob\RDStation\Http\RequestWrapper;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Illuminate\Contracts\Container\BindingResolutionException;
use Jetimob\Http\Request;
use Jetimob\RDStation\Http\RDStationAuthorizedRequest;
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
        $accessToken = $oAuth->getCachedAccessToken();

        if (is_null($accessToken) || is_null($accessToken->getRefreshToken())) {
            throw new RuntimeException('There is no access token to be revoked');
        }

        $response = $this->http->send(new RDStationAuthorizedRequest('post', '/auth/revoke'), [
            RequestOptions::JSON => [
                'token' => $accessToken->getRefreshToken(),
                'token_type_hint' => 'refresh_token',
            ],
        ]);

        $oAuth->forgetAccessToken();

        return $response;
    }
}
