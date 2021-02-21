<?php

namespace Jetimob\RDStation\Api\Webhook;

use Jetimob\Http\Response;
use Jetimob\RDStation\ObjectMapping\Webhook\Webhook;

/**
 * Class WebhookListResponse
 * @package Jetimob\RDStation\Api\Webhook
 * @see https://developers.rdstation.com/en/reference/webhooks
 */
class WebhookListResponse extends Response
{
    /** @var \Jetimob\RDStation\ObjectMapping\Webhook\Webhook[] $webhooks */
    protected array $webhooks;

    /**
     * @return Webhook[]
     */
    public function getWebhooks(): array
    {
        return $this->webhooks;
    }
}
