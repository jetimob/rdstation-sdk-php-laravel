<?php

namespace Jetimob\RDStation\Api\CustomFields;

use Jetimob\Http\Response;
use Jetimob\RDStation\ObjectMapping\CustomFields\CustomField;

/** @link https://developers.rdstation.com/reference/get_platform-contacts-fields */
class CustomFieldsListResponse extends Response
{
    protected array $fields;

    protected function fieldsItemType(): string
    {
        return CustomField::class;
    }

    /** @return CustomField[] */
    public function getFields(): array
    {
        return $this->fields;
    }
}
