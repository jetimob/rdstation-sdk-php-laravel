<?php

namespace Jetimob\RDStation\Api;

use Jetimob\Http\Authorization\OAuth\OAuthFlow;
use Jetimob\Http\Request;

class RDStationAuthorizedRequest extends Request
{
    public function __construct($method, $uri, array $headers = [], $body = null)
    {
        parent::__construct($method, $uri, $headers, $body, OAuthFlow::AUTHORIZATION_CODE);
    }
}
