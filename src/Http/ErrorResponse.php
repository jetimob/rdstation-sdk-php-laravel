<?php

namespace Jetimob\RDStation\Http;

use Jetimob\Http\IErrorResponse;
use Jetimob\Http\Response;
use Jetimob\RDStation\ObjectMapping\ErrorMessage;

/**
 * Class ErrorResponse
 * @package Jetimob\RDStation\Http
 * @see https://developers.rdstation.com/en/error-states
 */
class ErrorResponse extends Response implements IErrorResponse
{
    /** @var ErrorResponse|ErrorResponse[]|null $errors */
    protected $errors;

    public function initComplexObjects()
    {
        if (!$this->data->errors) {
            $this->errors = null;
        }

        if (is_array($this->data->errors)) {
            $this->errors = ErrorMessage::deserializeArray($this->data->errors);
        } else {
            $this->errors = ErrorMessage::deserialize($this->data->errors);
        }
    }
}
