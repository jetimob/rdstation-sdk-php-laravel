<?php

namespace Jetimob\RDStation\Data\Webhook;

trait WebhookIdentifierTrait
{
    /** @var string $event_type The event type that triggers the webhook request. */
    protected string $event_type;

    /** @var string $event_identifier Allows filtering the identifiers of the event that trigger the webhoook. Only for 'WEBHOOK.CONVERTED' events. */
    protected string $event_identifier;

    /** @var string $entity_type The entity of the webhook subscription. */
    protected string $entity_type;
}
