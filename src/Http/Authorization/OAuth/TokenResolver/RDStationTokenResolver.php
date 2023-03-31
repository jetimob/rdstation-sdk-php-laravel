<?php

namespace Jetimob\RDStation\Http\Authorization\OAuth\TokenResolver;

use GuzzleHttp\RequestOptions;
use Jetimob\Http\Authorization\OAuth\AccessToken;
use Jetimob\Http\Authorization\OAuth\Exceptions\AccessTokenExpiredException;
use Jetimob\Http\Authorization\OAuth\Exceptions\AuthorizationCodeRequiredException;
use Jetimob\Http\Authorization\OAuth\OAuthClient;
use Jetimob\Http\Authorization\OAuth\OAuthFlow;
use Jetimob\Http\Authorization\OAuth\TokenResolvers\OAuthTokenResolver;

class RDStationTokenResolver extends OAuthTokenResolver
{
    /**
     * @link https://developers.rdstation.com/reference/obtendo-token-de-acesso-pelo-refresh_token
     * @throws AuthorizationCodeRequiredException
     * @throws \JsonException
     */
    public function resolveAccessToken(OAuthClient $client, ?string $credentials = null): AccessToken
    {
        return $this->issueAccessTokenRequest($client, OAuthFlow::AUTHORIZATION_CODE, $credentials, function (array $requestOptions) use ($client) {
            $requestOptions[RequestOptions::FORM_PARAMS]['client_secret'] = $client->getClientSecret();
            return $requestOptions;
        });
    }

    /**
     * @link https://developers.rdstation.com/reference/obtendo-token-de-acesso-pelo-refresh_token
     * @throws AccessTokenExpiredException
     * @throws AuthorizationCodeRequiredException
     * @throws \JsonException
     */
    public function refreshAccessToken(OAuthClient $client, AccessToken $accessToken): AccessToken
    {
        if (!$accessToken->hasRefreshToken()) {
            throw new AccessTokenExpiredException('The access token has expired and cannot be refreshed!');
        }

        return $this->issueAccessTokenRequest($client, 'refresh_token', $accessToken->getRefreshToken(), function (array $requestOptions) use ($client) {
            $requestOptions[RequestOptions::FORM_PARAMS]['client_id'] = $client->getClientId();
            $requestOptions[RequestOptions::FORM_PARAMS]['client_secret'] = $client->getClientSecret();
            return $requestOptions;
        });
    }
}
