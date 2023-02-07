<?php

namespace Jetimob\RDStation\Tests\Feature;

use Jetimob\RDStation\Api\CustomFields\CustomFieldsListResponse;
use Jetimob\RDStation\Facade\RDStation;
use Jetimob\RDStation\ObjectMapping\CustomFields\CustomField;
use Jetimob\RDStation\Tests\AuthzBase;

class CustomFieldsTest extends AuthzBase
{
    /** @test */
    public function list(): void
    {
        /** @var CustomFieldsListResponse $response */
        $response = RDStation::customFields()->list();

        self::assertNotEmpty($response->getFields());
        self::assertInstanceOf(CustomField::class, $response->getFields()[0]);
        $cf = $response->getFields()[0];
        self::assertNotEmpty($cf->getLabel());
        self::assertNotEmpty($cf->getLabel()->getPtBr());
        self::assertNotEmpty($cf->getLabel()->getDefault());
    }
}
