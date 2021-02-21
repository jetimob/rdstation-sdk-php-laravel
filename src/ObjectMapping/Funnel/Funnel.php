<?php

namespace Jetimob\RDStation\ObjectMapping\Funnel;

use Jetimob\Http\Traits\Serializable;

/**
 * Class Funnel
 * @package Jetimob\RDStation\ObjectMapping\Funnel
 * @see https://developers.rdstation.com/en/reference/contacts/funnels
 */
class Funnel
{
    use Serializable;

    /** @var string|null The contact funnel name. For now, the only accepted option is: "default". */
    protected ?string $name;

    /** @var string The stage in the funnel which the contact belongs to. Valid options: 'Lead', 'Qualified Lead' and 'Client'. */
    protected string $lifecycle_stage;

    /** @var bool It indicates whether the contact is an opportunity or not in the funnel. */
    protected bool $opportunity;

    /** @var string The email of the user responsible for the contact. */
    protected string $contact_owner_email;

    /** @var int The contact fit score in the current funnel. */
    protected int $fit;

    /** @var int The contact interest score in the current funnel. */
    protected int $interest;

    /** @var string|null $origin */
    protected ?string $origin;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLifecycleStage(): string
    {
        return $this->lifecycle_stage;
    }

    /**
     * @return bool
     */
    public function isOpportunity(): bool
    {
        return $this->opportunity;
    }

    /**
     * @return string
     */
    public function getContactOwnerEmail(): string
    {
        return $this->contact_owner_email;
    }

    /**
     * @return int
     */
    public function getFit(): int
    {
        return $this->fit;
    }

    /**
     * @return int
     */
    public function getInterest(): int
    {
        return $this->interest;
    }

    /**
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
}
