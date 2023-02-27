<?php

namespace Jetimob\RDStation\Api\Webhook;

enum WebhookEventType: string
{
    case EventTypeConverted = 'WEBHOOK.CONVERTED';
    case EventTypeMarkedOpportunity = 'WEBHOOK.MARKED_OPPORTUNITY';
}
