<?php

namespace Jetimob\RDStation\Api\Webhook;

use Jetimob\Http\Traits\Serializable;

class CreateWebhookDTO implements \JsonSerializable
{
    use Serializable;

    /**
     * @param WebhookEventType $eventType O tipo de evento que aciona a solicitação de webhook. Atualmente somente 'WEBHOOK.CONVERTED' ou 'WEBHOOK.MARKED_OPPORTUNITY' são suportados
     * @param string $url A URL de destino do webhook
     * @param array $eventIdentifiers Os identificadores dos eventos que devem acionar o webhook. Apenas para eventos 'WEBHOOK.CONVERTED'
     * @param WebhookIncludeRelation[] $includeRelations Quais itens adicionais serão fornecidos no payload do webhook. Apenas 'COMPANY' e 'CONTACT_FUNNEL' são opções válidas
     * @param string $httpMethod O método http que o webhook acionará. Atualmente, apenas o método 'POST' é suportado
     * @param string $entityType A entidade da assinatura do webhook. Por enquanto, 'CONTATO' é a única opção aceita
     */
    public function __construct(
        public readonly WebhookEventType $eventType,
        public readonly string $url,
        public readonly array $eventIdentifiers = [],
        public readonly array $includeRelations = [],
        public readonly string $httpMethod = 'POST',
        public readonly string $entityType = 'CONTACT',
    ) {
    }
}
