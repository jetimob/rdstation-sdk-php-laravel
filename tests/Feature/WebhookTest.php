<?php

namespace Jetimob\RDStation\Tests\Feature;

use Jetimob\RDStation\Facade\RDStation;
use Jetimob\RDStation\Tests\AuthzBase;
use Psr\Http\Message\ResponseInterface;

class WebhookTest extends AuthzBase
{
    /** @test */
    public function list_webhooks_without_authorization_code_should_fail(): void
    {
        /** @var ResponseInterface $response */
        $response = RDStation::webhook()->list();
        self::assertNotEmpty($response);
        self::assertInstanceOf(ResponseInterface::class, $response);
        self::assertSame(200, $response->getStatusCode());
    }
}
