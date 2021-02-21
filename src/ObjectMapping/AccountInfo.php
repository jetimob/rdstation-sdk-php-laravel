<?php

namespace Jetimob\RDStation\ObjectMapping;

use Jetimob\Http\Response;

class AccountInfo extends Response
{
    protected string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
