<?php

namespace Jetimob\RDStation\Api;

use GuzzleHttp\RequestOptions;
use Jetimob\Http\AbstractApi;
use Jetimob\Http\Request;

abstract class RDStationAbstractApi extends AbstractApi
{
    protected function makeBaseRequest($method, $path, array $headers = [], $body = null): Request
    {
        return new RDStationAuthorizedRequest($method, $path, $headers, $body);
    }

    protected function mappedPost(string $path, string $responseClass, array $data = [], array $options = [])
    {
        if (!empty($data)) {
            $options[RequestOptions::JSON] = array_merge($options[RequestOptions::JSON] ?? [], $data);
        }

        return parent::mappedPost($path, $responseClass, $options);
    }
}
