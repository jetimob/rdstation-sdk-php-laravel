<?php

namespace Jetimob\RDStation\Api\CustomFields;

use Jetimob\Http\Response;
use Jetimob\RDStation\Data\CustomFields\CustomField;

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

    /** @return CustomField[] */
    public function getUserDefinedFields(): array
    {
        return array_filter($this->fields, static function (CustomField $field) {
            return $field->isCustomField();
        });
    }
}
