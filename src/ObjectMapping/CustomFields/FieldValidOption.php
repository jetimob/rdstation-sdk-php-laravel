<?php

namespace Jetimob\RDStation\ObjectMapping\CustomFields;

use Jetimob\Http\Traits\Serializable;

class FieldValidOption
{
    use Serializable;

    protected string $value;
    protected FieldI18n $label;

    public function getValue(): string
    {
        return $this->value;
    }

    public function getLabel(): FieldI18n
    {
        return $this->label;
    }
}
