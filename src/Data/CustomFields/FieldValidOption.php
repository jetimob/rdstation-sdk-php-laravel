<?php

namespace Jetimob\RDStation\Data\CustomFields;

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

    public static function new(string $value, FieldI18n $label): self
    {
        $instance = new self();
        $instance->value = $value;
        $instance->label = $label;
        return $instance;
    }
}
