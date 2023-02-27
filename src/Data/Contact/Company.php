<?php

namespace Jetimob\RDStation\Data\Contact;

use Jetimob\Http\Traits\Serializable;

class Company
{
    use Serializable;

    protected string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
