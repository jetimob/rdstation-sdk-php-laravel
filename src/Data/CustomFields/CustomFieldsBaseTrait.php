<?php

namespace Jetimob\RDStation\Data\CustomFields;

trait CustomFieldsBaseTrait
{
    /** @var string O uuid associado a cada campo do RD Station */
    protected string $uuid;
    /** @var string Identificador exclusivo para referenciar este campo para chamadas de terminais do contato. O 'api identifier' de um campo não pode ser alterado posteriormente. Deve iniciar com o prefixo: cf_. */
    protected string $api_identifier;
    /** @var bool Ele é definido como 'false' para campos padrão e 'true' para campos personalizados. */
    protected bool $custom_field;
    /** @var string O tipo de dados do campo. Os valores possíveis são 'BOOLEAN', 'STRING', 'STRING[]' e 'INTEGER'. */
    protected string $data_type;
    /** @var FieldI18n Nome do campo no RD Station */
    protected FieldI18n $name;
    /** @var FieldI18n Label do campo nos formulários do RD Station */
    protected FieldI18n $label;
    /** @var string O tipo do campo */
    protected string $presentation_type;
    /** @var FieldValidationRules|null As regras de validação do campo. */
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
