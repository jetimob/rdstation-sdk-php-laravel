<?php

namespace Jetimob\RDStation\Api\Webhook;

use Jetimob\Http\Response;

/**
 * Class WebhookDeleteResponse
 * @package Jetimob\RDStation\Api\Webhook
 * @see https://developers.rdstation.com/en/reference/webhooks
 */
class WebhookDeleteResponse extends Response
{
    /** @var string $uuid The unique uuid associated to each RD Station webhook subscription. */
    protected string $uuid;

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }
}
