<?php

namespace Jetimob\RDStation\Http;

use Jetimob\Http\Request;

class RDStationRequest extends Request
{
    public function __construct($method, $uri, array $headers = [], $body = null, ?string $oAuthGrantType = null, $version = '1.1')
    {
        parent::__construct($method, $uri, $headers, $body, $oAuthGrantType, $version);
    }
}
