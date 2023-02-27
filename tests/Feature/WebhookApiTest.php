<?php

namespace Jetimob\RDStation\Tests\Feature;

use GuzzleHttp\Psr7\Response;
use Jetimob\RDStation\Api\Webhook\CreateWebhookDTO;
use Jetimob\RDStation\Api\Webhook\CreateWebhookResponse;
use Jetimob\RDStation\Api\Webhook\WebhookApi;
use Jetimob\RDStation\Api\Webhook\WebhookEventType;
use Jetimob\RDStation\Api\Webhook\WebhookListResponse;
use Jetimob\RDStation\Facades\RDStation;
use Jetimob\RDStation\Tests\AbtractTestCase;

class WebhookApiTest extends AbtractTestCase
{
    /** @test */
    public function apiShouldExist(): void
    {
        $this->assertInstanceOf(WebhookApi::class, RDStation::webhook());
    }

    /** @test */
    public function shouldListExistingWebhooks(): void
    {
        $this->assertTrue(method_exists(RDStation::webhook(), 'list'));
        /** @var WebhookListResponse $response */
        $response = RDStation::webhook()->list();
        $this->assertIsArray($response->getWebhooks());
    }

    /** @test */
    public function shouldCreateAndDeleteWebhook(): void
    {
        $this->assertTrue(method_exists(RDStation::webhook(), 'create'));
        $this->assertTrue(method_exists(RDStation::webhook(), 'delete'));

        /** @var CreateWebhookResponse $response */
        $response = RDStation::webhook()->create(new CreateWebhookDTO(
            WebhookEventType::EventTypeConverted,
            'https://webhook.site'
        ));
        $uuid = $response->getUuid();
        $this->assertIsString($uuid);
        $this->assertNotEmpty($uuid);

        /** @var Response $response */
        $response = RDStation::webhook()->delete($uuid);
        $this->assertSame(204, $response->getStatusCode());
    }
}
