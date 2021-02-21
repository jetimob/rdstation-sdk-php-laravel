<?php

namespace Jetimob\RDStation\ObjectMapping;

use Jetimob\Http\Traits\Serializable;

/**
 * Class ErrorMessage
 * @package Jetimob\RDStation\ObjectMapping
 * @see https://developers.rdstation.com/en/error-states
 */
class ErrorMessage
{
    use Serializable;

    /** @var string $error_type */
    protected string $error_type;

    /** @var string $error_message */
    protected string $error_message;
}
