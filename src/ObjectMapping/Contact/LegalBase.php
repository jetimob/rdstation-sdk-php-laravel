<?php

namespace Jetimob\RDStation\ObjectMapping\Contact;

use Jetimob\Http\Traits\Serializable;

/**
 * Class LegalBase
 * @package Jetimob\RDStation\ObjectMapping\Contact
 */
class LegalBase
{
    use Serializable;

    /** @var string $category */
    protected string $category;

    /** @var string $type */
    protected string $type;

    /** @var string $status */
    protected string $status;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
