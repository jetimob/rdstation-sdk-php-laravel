<?php

namespace Jetimob\RDStation;

use Jetimob\Http\Http;
use Jetimob\Http\OAuth\OAuth;
use Jetimob\Http\OAuth\OAuthClient;
use Jetimob\RDStation\Http\RequestWrapper\WebhookRequestWrapper;

/**
 * Class RDStation
 * @package Jetimob\RDStation
 * @see https://developers.rdstation.com/en/overview
 */
class RDStation
{
    private Http $http;
    private array $config;
    private array $instanceCache = [];

    /**
     * RDStation constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->http = new Http($config);
    }

    private function getInstance(string $class)
    {
        if (isset($this->instanceCache[$class])) {
            return $this->instanceCache[$class];
        }

        $this->instanceCache[$class] = new $class($this->getHttpClient());
        return $this->instanceCache[$class];
    }

    public function webhook(): WebhookRequestWrapper
    {
        return $this->getInstance(WebhookRequestWrapper::class);
    }

    public function getHttpClient(): Http
    {
        return $this->http;
    }

    public function getOAuthHandler(): OAuth
    {
        return $this->getHttpClient()->oAuth();
    }

    public function getOAuthClient(): OAuthClient
    {
        return $this->getOAuthHandler()->getClient();
    }

    public function handleAuthorizationCodeExchange(string $code)
    {
        return $this->getOAuthHandler()->handleAuthorizationCodeExchange($code);
    }

    /**
     * Returns the configuration value from a given key. Default value is returned if the key is not found.
     * @param string $key
     * @param mixed|null $default
     * @return mixed|null
     */
    public function getConfig(string $key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }

    public function config(): array
    {
        return $this->config;
    }
}
