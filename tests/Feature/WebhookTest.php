<?php

namespace Jetimob\RDStation\Tests\Feature;

use Jetimob\RDStation\Facade\RDStation;
use Jetimob\RDStation\Tests\AuthzBaseCase;
use Psr\Http\Message\ResponseInterface;

class WebhookTest extends AuthzBaseCase
{
    /** @test */
    public function list_webhooks_without_authorization_code_should_fail(): void
    {
        /** @var ResponseInterface $response */
        $response = RDStation::listWebhooks();
        self::assertNotEmpty($response);
        self::assertInstanceOf(ResponseInterface::class, $response);
        self::assertSame(200, $response->getStatusCode());
    }
}
