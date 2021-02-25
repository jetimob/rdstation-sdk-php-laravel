<?php

namespace Jetimob\RDStation\Api\Webhook;

use Jetimob\Http\Response;
use Jetimob\RDStation\ObjectMapping\Webhook\Webhook;

/**
 * Class WebhookListResponse
 * @package Jetimob\RDStation\Api\Webhook
 * @link https://developers.rdstation.com/en/reference/webhooks
 */
class WebhookListResponse extends Response
{
    /** @var Webhook[] $webhooks */
    protected array $webhooks;

    protected function webhooksItemType(): string
    {
        return Webhook::class;
    }

    /**
     * @return Webhook[]
     */
    public function getWebhooks(): array
    {
        return $this->webhooks;
    }
}
