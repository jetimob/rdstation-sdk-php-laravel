<?php

namespace Jetimob\RDStation\Tests\Feature;

use GuzzleHttp\Psr7\Response;
use Jetimob\RDStation\Api\CustomFields\CreateCustomFieldDTO;
use Jetimob\RDStation\Api\CustomFields\CreateCustomFieldResponse;
use Jetimob\RDStation\Api\CustomFields\CustomFieldDataTypeEnum;
use Jetimob\RDStation\Api\CustomFields\CustomFieldPresentationTypeEnum;
use Jetimob\RDStation\Api\CustomFields\CustomFieldsApi;
use Jetimob\RDStation\Api\CustomFields\CustomFieldsListResponse;
use Jetimob\RDStation\Data\CustomFields\CustomField;
use Jetimob\RDStation\Facades\RDStation;
use Jetimob\RDStation\Tests\AbtractTestCase;

class CustomFieldsApiTest extends AbtractTestCase
{
    /** @test */
    public function apiShouldExist(): void
    {
        $this->assertInstanceOf(CustomFieldsApi::class, RDStation::customFields());
    }

    /** @test */
    public function shouldListCustomFields(): void
    {
        $this->assertTrue(method_exists(RDStation::customFields(), 'list'));
        /** @var CustomFieldsListResponse $response */
        $response = RDStation::customFields()->list();
        $this->assertIsArray($response->getFields());
        $this->assertNotEmpty($response->getFields());
        $this->assertInstanceOf(CustomField::class, $response->getFields()[0]);
        $this->assertEmpty($response->getUserDefinedFields());
    }

    /** @test */
    public function shouldCreateAndDeleteCustomField(): void
    {
        $this->assertTrue(method_exists(RDStation::customFields(), 'create'));
        $this->assertTrue(method_exists(RDStation::customFields(), 'delete'));

        /** @var CreateCustomFieldResponse $response */
        $response = RDStation::customFields()->create(new CreateCustomFieldDTO(
            'cf_meu_campo',
            CustomFieldDataTypeEnum::Integer,
            'Meu campo customizado',
            'Meu campo customizado',
            CustomFieldPresentationTypeEnum::NumberInput,
        ));

        $uuid = $response->getUuid();
        $this->assertIsString($uuid);
        $this->assertNotEmpty($uuid);

        /** @var Response $response */
        $response = RDStation::customFields()->delete($uuid);
        $this->assertSame(204, $response->getStatusCode());
    }
}
