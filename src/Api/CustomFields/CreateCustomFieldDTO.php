<?php

namespace Jetimob\RDStation\Api\CustomFields;

use Jetimob\Http\Traits\Serializable;
use Jetimob\RDStation\Data\CustomFields\FieldValidationRules;

class CreateCustomFieldDTO implements \JsonSerializable
{
    use Serializable;

    /**
     * @param string $apiIdentifier Identificador exclusivo para referenciar este campo para chamadas de terminais do contato. O 'api_identifier' de um campo não pode ser alterado posteriormente
     * @param CustomFieldDataTypeEnum $dataType Tipo de dados para o qual o valor do campo deve ser formatado
     * @param string $name Nome do campo no RD Station
     * @param string $label Label do campo nos formulários do RD Station
     * @param CustomFieldPresentationTypeEnum $presentationType O tipo do campo nos formulários
     * @param FieldValidationRules|null $validationRules As regras de validação do campo
     */
    public function __construct(
        public readonly string $apiIdentifier,
        public readonly CustomFieldDataTypeEnum $dataType,
        public readonly string $name,
        public readonly string $label,
        public readonly CustomFieldPresentationTypeEnum $presentationType,
        public readonly ?FieldValidationRules $validationRules = null,
    )
    {
        if (!str_starts_with($apiIdentifier, 'cf_')) {
            throw new \InvalidArgumentException('The api identifier must start with "cf_"');
        }
    }
}
