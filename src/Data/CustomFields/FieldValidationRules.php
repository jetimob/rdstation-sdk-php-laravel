<?php

namespace Jetimob\RDStation\Data\CustomFields;

use Jetimob\Http\Traits\Serializable;

class FieldValidationRules
{
    use Serializable;

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

    public static function new(array $validOptions): self
    {
        $instance = new self();
        $instance->valid_options = $validOptions;
        return $instance;
    }
}
