<?php

namespace Jetimob\RDStation\Api\CustomFields;

use GuzzleHttp\Psr7\Response;
use Jetimob\RDStation\Api\RDStationAbstractApi;

/**
 * @link https://developers.rdstation.com/reference/get_platform-contacts-fields
 */
class CustomFieldsApi extends RDStationAbstractApi
{
    /**
     * @link https://developers.rdstation.com/reference/get_platform-contacts-fields
     * @return CustomFieldsListResponse
     */
    public function list(): CustomFieldsListResponse
    {
        return $this->mappedGet('platform/contacts/fields', CustomFieldsListResponse::class);
    }

    /**
     * @link https://developers.rdstation.com/reference/post_platform-contacts-fields
     * @param CreateCustomFieldDTO $customField
     * @return CreateCustomFieldResponse
     */
    public function create(CreateCustomFieldDTO $customField): CreateCustomFieldResponse
    {
        return $this->mappedPost('https://api.rd.services/platform/contacts/fields', CreateCustomFieldResponse::class, [
            'api_identifier' => $customField->apiIdentifier,
            'data_type' => $customField->dataType->value,
            'name' => [
                'pt-BR' => $customField->name,
            ],
            'label' => [
                'pt-BR' => $customField->label,
            ],
            'presentation_type' => $customField->presentationType->value,
            'validation_rules' => $customField->validationRules?->toArray(),
        ]);
    }

    /**
     * @link https://developers.rdstation.com/reference/delete_platform-contacts-fields-uuid
     * @param string $uuid O uuid exclusivo associado a cada campo do RD Station.
     * @return Response
     */
    public function delete(string $uuid): Response
    {
        return $this->http->send($this->makeBaseRequest('DELETE', "platform/contacts/fields/$uuid"));
    }
}
