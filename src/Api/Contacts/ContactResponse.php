<?php

namespace Jetimob\RDStation\Api\Contacts;

use Jetimob\Http\Response;
use Jetimob\RDStation\ObjectMapping\Contact\Company;
use Jetimob\RDStation\ObjectMapping\Contact\ContactData;
use Jetimob\RDStation\ObjectMapping\Contact\LegalBase;
use Jetimob\RDStation\ObjectMapping\Funnel\Funnel;

/**
 * Class ContactResponse
 * @package Jetimob\RDStation\Api\Contacts
 * @link https://developers.rdstation.com/en/reference/contacts
 */
class ContactResponse extends Response
{
    use ContactData;

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid ?? null;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name ?? null;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email ?? null;
    }

    /**
     * @return string|null
     */
    public function getBio(): ?string
    {
        return $this->bio ?? null;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website ?? null;
    }

    /**
     * @return string|null
     */
    public function getJobTitle(): ?string
    {
        return $this->job_title ?? null;
    }

    /**
     * @return string|null
     */
    public function getPersonalPhone(): ?string
    {
        return $this->personal_phone ?? null;
    }

    /**
     * @return string|null
     */
    public function getMobilePhone(): ?string
    {
        return $this->mobile_phone ?? null;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city ?? null;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state ?? null;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country ?? null;
    }

    /**
     * @return string|null
     */
    public function getTwitter(): ?string
    {
        return $this->twitter ?? null;
    }

    /**
     * @return string|null
     */
    public function getFacebook(): ?string
    {
        return $this->facebook ?? null;
    }

    /**
     * @return string|null
     */
    public function getLinkedin(): ?string
    {
        return $this->linkedin ?? null;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags ?? [];
    }

    /**
     * @return string[]
     */
    public function getExtraEmails(): array
    {
        return $this->extra_emails ?? [];
    }

    /**
     * @return LegalBase[]
     */
    public function getLegalBases(): array
    {
        return $this->legal_bases ?? [];
    }

    /**
     * @return Company|null
     */
    public function getCompany(): ?Company
    {
        return $this->company ?? null;
    }

    /**
     * @return Funnel|null
     */
    public function getFunnel(): ?Funnel
    {
        return $this->funnel ?? null;
    }
}
