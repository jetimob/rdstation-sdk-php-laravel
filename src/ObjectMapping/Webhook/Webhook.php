<?php

namespace Jetimob\RDStation\ObjectMapping\Webhook;

use Jetimob\Http\Traits\Serializable;

/**
 * Class Webhook
 * @package Jetimob\RDStation\ObjectMapping\Webhook
 * @see https://developers.rdstation.com/en/reference/webhooks
 */
class Webhook
{
    use Serializable;
    use WebhookBaseTrait;

    /** @var string $uuid The unique uuid associated to each RD Station webhook subscription. */
    protected string $uuid;

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->event_type;
    }

    /**
     * @return string
     */
    public function getEventIdentifier(): string
    {
        return $this->event_identifier;
    }

    /**
     * @return string
     */
    public function getEntityType(): string
    {
        return $this->entity_type;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return $this->http_method;
    }

    /**
     * @return string[]
     */
    public function getIncludeRelations(): array
    {
        return $this->include_relations;
    }
}
