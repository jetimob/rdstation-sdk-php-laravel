<?php

namespace Jetimob\RDStation\Api\Auth;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Jetimob\RDStation\Api\RDStationAbstractApi;

class AuthApi extends RDStationAbstractApi
{
    /**
     * @link https://developers.rdstation.com/reference/revogando-o-acesso-de-um-token
     * @return Response
     */
    public function revoke(): Response
    {
        $oAuth = $this->http->oAuth();
        $accessToken = $oAuth->getCachedAccessToken();

        if ($accessToken === null || $accessToken->getRefreshToken() === null) {
            throw new \RuntimeException('No access token or refresh token found');
        }

        $response = $this->http->send($this->makeBaseRequest('POST', 'oauth/revoke'), [
            RequestOptions::FORM_PARAMS => [
                'token' => $accessToken->getRefreshToken(),
                'token_type_hint' => 'refresh_token',
            ],
        ]);

        $oAuth->forgetAccessToken();

        return $response;
    }
}
