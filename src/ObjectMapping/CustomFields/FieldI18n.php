<?php

namespace Jetimob\RDStation\ObjectMapping\CustomFields;

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
}
