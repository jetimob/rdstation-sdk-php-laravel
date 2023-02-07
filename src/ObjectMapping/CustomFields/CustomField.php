<?php

namespace Jetimob\RDStation\ObjectMapping\CustomFields;


use Jetimob\Http\Traits\Serializable;

class CustomField
{
    use Serializable;

    protected string $uuid;
    protected string $api_identifier;
    protected bool $custom_field;
    protected string $data_type;
    protected FieldI18n $name;
    protected FieldI18n $label;
    protected string $presentation_type;
    protected ?FieldValidationRules $validation_rules = null;

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getApiIdentifier(): string
    {
        return $this->api_identifier;
    }

    public function isCustomField(): bool
    {
        return $this->custom_field;
    }

    public function getDataType(): string
    {
        return $this->data_type;
    }

    public function getName(): FieldI18n
    {
        return $this->name;
    }

    public function getLabel(): FieldI18n
    {
        return $this->label;
    }

    public function getPresentationType(): string
    {
        return $this->presentation_type;
    }

    public function getValidationRules(): ?FieldValidationRules
    {
        return $this->validation_rules;
    }
}
