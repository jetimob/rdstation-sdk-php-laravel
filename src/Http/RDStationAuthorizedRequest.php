<?php

namespace Jetimob\RDStation\Http;

use Jetimob\Http\Authorization\OAuth\OAuthFlow;

class RDStationAuthorizedRequest extends RDStationRequest
{
    public function __construct($method, $uri, array $headers = [], $body = null, $version = '1.1')
    {
        parent::__construct($method, $uri, $headers, $body, OAuthFlow::AUTHORIZATION_CODE, $version);
    }
}
