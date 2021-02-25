<?php

namespace Jetimob\RDStation\ObjectMapping\Webhook;

use Jetimob\Http\Traits\Serializable;
use Jetimob\RDStation\ObjectMapping\Contact\Contact;

/**
 * Class WebhookPayload
 * @package Jetimob\RDStation\ObjectMapping\Webhook
 * @link https://developers.rdstation.com/en/reference/webhooks#webhooks-request
 */
class WebhookPayload
{
    use Serializable;
    use WebhookIdentifierTrait;

    /** @var string $timestamp (DateTime) The time when the webhook was sent. */
    protected string $timestamp;

    /** @var string $event_timestamp (DateTime) The time when the event that triggered the webhook has occurred. */
    protected string $event_timestamp;

    /** @var Contact $contact The entity itself, could be company or any other supported entity. */
    protected Contact $contact;

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
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getEventTimestamp(): string
    {
        return $this->event_timestamp;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }


    /**
     * @return bool
     */
    public function isContactEntity(): bool
    {
        return $this->entity_type === 'CONTACT';
    }

    /**
     * @return bool
     */
    public function isEventOfTypeMarkedOpportunity(): bool
    {
        return $this->event_type === 'WEBHOOK.MARKED_OPPORTUNITY';
    }
}
