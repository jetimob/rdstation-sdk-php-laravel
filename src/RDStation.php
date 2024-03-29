<?php

namespace Jetimob\RDStation;

use Jetimob\Http\Contracts\HttpProviderContract;
use Jetimob\Http\Http;
use Jetimob\RDStation\Api\Auth\AuthApi;
use Jetimob\RDStation\Api\CustomFields\CustomFieldsApi;
use Jetimob\RDStation\Api\Webhook\WebhookApi;
use RuntimeException;

/**
 * @method CustomFieldsApi customFields()
 * @method WebhookApi webhook()
 * @method AuthApi auth()
 */
class RDStation implements HttpProviderContract
{
    protected Http $client;
    protected array $config;

    public function __construct(array $config = [])
    {
        $this->client = new Http($config['http'] ?? []);
        $this->config = $config;
    }

    public function getHttpInstance(): Http
    {
        return $this->client;
    }

    public function getConfig(): array
    {
        return $this->config ?? [];
    }

    public function __call(string $name, array $arguments)
    {

        if (!($apiImpl = $this->config['api_impl'] ?? null) || !array_key_exists($name, $apiImpl)) {
            throw new RuntimeException("O endpoint '$name' não não existe");
        }

        return new $apiImpl[$name]($this);
    }
}
