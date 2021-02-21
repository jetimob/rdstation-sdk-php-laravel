<?php

namespace Jetimob\RDStation\ObjectMapping\Webhook;

/**
 * Trait WebhookBaseTrait
 * @package Jetimob\RDStation\ObjectMapping\Webhook
 */
trait WebhookBaseTrait
{
    use WebhookIdentifierTrait;

    /** @var string $url The webhook destination URL. */
    protected string $url;

    /** @var string $http_method The http method that the webhook will trigger. */
    protected string $http_method;

    /** @var string[] $include_relations Which additional relations will be provided in the webhook payload. */
    protected array $include_relations;
}
