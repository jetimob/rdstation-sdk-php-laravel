<?php

namespace Jetimob\RDStation\Http\Authorization\OAuth\TokenResolver;

use GuzzleHttp\RequestOptions;
use Jetimob\Http\Authorization\OAuth\AccessToken;
use Jetimob\Http\Authorization\OAuth\Exceptions\AuthorizationCodeRequiredException;
use Jetimob\Http\Authorization\OAuth\OAuthClient;
use Jetimob\Http\Authorization\OAuth\OAuthFlow;
use Jetimob\Http\Authorization\OAuth\TokenResolvers\OAuthTokenResolver;

class RDStationTokenResolver extends OAuthTokenResolver
{
    /**
     * @throws AuthorizationCodeRequiredException
     * @throws \JsonException
     */
    public function resolveAccessToken(OAuthClient $client, ?string $credentials = null): AccessToken
    {
        return $this->issueAccessTokenRequest($client, OAuthFlow::AUTHORIZATION_CODE, $credentials, function (array $requestOptions) use ($client) {
            // precisamos mandar o client_id quando o token está sendo atualizado
            // @link https://developers.rdstation.com/reference/obtendo-token-de-acesso-pelo-refresh_token
            $requestOptions[RequestOptions::FORM_PARAMS]['client_id'] = $client->getClientId();
            $requestOptions[RequestOptions::FORM_PARAMS]['client_secret'] = $client->getClientSecret();
            return $requestOptions;
        });
    }
}
