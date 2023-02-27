<?php

namespace Jetimob\RDStation\Data\CustomFields;

use Jetimob\Http\Traits\Serializable;

class FieldI18n
{
    use Serializable;

    protected string $default;
    protected string $pt_BR;

    public function getDefault(): string
    {
        return $this->default;
    }

    public function getPtBr(): string
    {
        return $this->pt_BR;
    }

    public function getPropertyname(string $propertyName): string
    {
        return str_replace('-', '_', $propertyName);
    }

    public static function new(string $default, string $ptBr): self
    {
        $instance = new self();
        $instance->default = $default;
        $instance->pt_BR = $ptBr;
        return $instance;
    }
}
