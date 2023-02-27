<?php

namespace Jetimob\RDStation\Api\Webhook;

use GuzzleHttp\Psr7\Response;
use Jetimob\RDStation\Api\RDStationAbstractApi;

/**
 * @link https://developers.rdstation.com/reference/webhooks
 */
class WebhookApi extends RDStationAbstractApi
{
    /**
     * Retorna uma lista com todas as assinaturas de webhook da sua conta.
     *
     * @link https://developers.rdstation.com/reference/get_integrations-webhooks
     * @return WebhookListResponse
     */
    public function list(): WebhookListResponse
    {
        return $this->mappedGet('integrations/webhooks', WebhookListResponse::class);
    }

    /**
     * Cria uma assinatura de webhook.
     *
     * @link https://developers.rdstation.com/reference/post_integrations-webhooks
     * @return CreateWebhookResponse
     */
    public function create(CreateWebhookDTO $webhook): CreateWebhookResponse
    {
        return $this->mappedPost('integrations/webhooks', CreateWebhookResponse::class, [
            'event_type' => $webhook->eventType->value,
            'entity_type' => $webhook->entityType,
            'event_identifiers' => $webhook->eventIdentifiers,
            'url' => $webhook->url,
            'http_method' => $webhook->httpMethod,
            'include_relations' => array_map(static fn (WebhookIncludeRelation $relation) => $relation->value, $webhook->includeRelations),
        ]);
    }

    /**
     * Deleta uma assinatura de webhook da conta atual.
     *
     * @param string $uuid O uuid exclusivo associado a cada webhook do RD Station.
     * @return Response
     */
    public function delete(string $uuid): Response
    {
        return $this->http->send($this->makeBaseRequest('DELETE', "integrations/webhooks/$uuid"));
    }
}
