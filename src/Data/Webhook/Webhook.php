<?php

namespace Jetimob\RDStation\Data\Webhook;

use Jetimob\Http\Traits\Serializable;

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
