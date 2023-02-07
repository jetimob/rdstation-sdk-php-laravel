<?php

namespace Jetimob\RDStation\Http\RequestWrapper;

use Jetimob\RDStation\Api\CustomFields\CustomFieldsListResponse;
use Jetimob\RDStation\Http\RDStationAuthorizedRequest;

/**
 * @link https://developers.rdstation.com/reference/get_platform-contacts-fields
 */
class CustomFieldsRequestWrapper extends RequestWrapper
{
    public function list()
    {
        return $this->http->sendExpectingResponseClass(
            new RDStationAuthorizedRequest('get', 'platform/contacts/fields'),
            CustomFieldsListResponse::class
        );
    }
}
