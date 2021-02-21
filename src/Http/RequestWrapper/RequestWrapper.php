<?php

namespace Jetimob\RDStation\Http\RequestWrapper;

use Jetimob\Http\Http;

abstract class RequestWrapper
{
    protected Http $http;

    public function __construct(Http $http)
    {
        $this->http = $http;
    }
}
