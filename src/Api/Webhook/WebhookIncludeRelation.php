<?php

namespace Jetimob\RDStation\Api\Webhook;

enum WebhookIncludeRelation: string
{
    case Company = 'COMPANY';
    case ContactFunnel = 'CONTACT_FUNNEL';
}
