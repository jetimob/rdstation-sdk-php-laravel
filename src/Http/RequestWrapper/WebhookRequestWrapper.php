<?php

namespace Jetimob\RDStation\Http\RequestWrapper;

use GuzzleHttp\RequestOptions;
use Jetimob\RDStation\Api\Webhook\WebhookCreateResponse;
use Jetimob\RDStation\Api\Webhook\WebhookDeleteResponse;
use Jetimob\RDStation\Api\Webhook\WebhookListResponse;
use Jetimob\RDStation\Http\RDStationAuthorizedRequest;

/**
 * Class WebhookRequestWrapper
 * @link https://developers.rdstation.com/en/reference/webhooks
 * @package Jetimob\RDStation\Http\RequestWrapper
 */
class WebhookRequestWrapper extends RequestWrapper
{
    private const WEBHOOK_ENDPOINT_PATH = '/integrations/webhooks';

    public const EVENT_TYPE_CONVERTED = 'WEBHOOK.CONVERTED';
    public const EVENT_TYPE_MARKED_OPPORTUNITY = 'WEBHOOK.MARKED_OPPORTUNITY';

    public function list()
    {
        return $this->http->sendExpectingResponseClass(
            new RDStationAuthorizedRequest('get', self::WEBHOOK_ENDPOINT_PATH),
            WebhookListResponse::class,
        );
    }

    /**
     * @param string $eventType The event type that triggers the webhook request. Currently only "WEBHOOK.CONVERTED" or "WEBHOOK.MARKED_OPPORTUNITY" are supported.
     * @param string $url The webhook destination URL
     * @param string[] $eventIdentifiers The identifiers from the events that must trigger the webhook. Only for "WEBHOOK.CONVERTED" events.
     * @param string[] $includeRelations The relations you would like to include in webhook payload. Only "COMPANY" and "CONTACT_FUNNEL" are supported.
     * @param string $httpMethod The http method that the webhook will trigger. Currently only "POST" methods are supported.
     * @param string $entityType The entity of the subscription. For now, "CONTACT" is the only accepted option.
     */
    public function create(
        string $eventType,
        string $url,
        array $eventIdentifiers = [],
        array $includeRelations = [],
        string $httpMethod = 'POST',
        string $entityType = 'CONTACT'
    ) {
        return $this->http->sendExpectingResponseClass(
            new RDStationAuthorizedRequest('post', self::WEBHOOK_ENDPOINT_PATH),
            WebhookCreateResponse::class,
            [
                RequestOptions::JSON => [
                    'event_type' => $eventType,
                    'entity_type' => $entityType,
                    'event_identifiers' => $eventIdentifiers,
                    'url' => $url,
                    'http_method' => $httpMethod,
                    'include_relations' => $includeRelations,
                ],
            ],
        );
    }

    public function delete(string $uuid)
    {
        return $this->http->send(
            new RDStationAuthorizedRequest('delete', self::WEBHOOK_ENDPOINT_PATH . '/' . $uuid),
        );
    }
}
