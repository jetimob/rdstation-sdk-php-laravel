<?php

namespace Jetimob\RDStation\ObjectMapping\Contact;

use Jetimob\Http\Traits\Serializable;

/**
 * Class Company
 * @package Jetimob\RDStation\ObjectMapping\Contact
 */
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
