<?php

namespace Jetimob\RDStation\ObjectMapping\CustomFields;

class FieldValidationRules
{
    protected array $valid_options;

    protected function validOptionsItemType(): string
    {
        return FieldValidOption::class;
    }

    /** @return FieldValidOption[] */
    public function getValidOptions(): array
    {
        return $this->valid_options;
    }
}
