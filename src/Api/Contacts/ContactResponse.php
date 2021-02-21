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
 * @see https://developers.rdstation.com/en/reference/contacts
 */
class ContactResponse extends Response
{
    use ContactData;

    public function initComplexObjects(): void
    {
        $this->tags = $this->data->tags ?? [];
        $this->extra_emails = $this->data->emails ?? [];
        $this->legal_bases = LegalBase::deserializeArray($this->data->legal_bases ?? []);
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @return string|null
     */
    public function getJobTitle(): ?string
    {
        return $this->job_title;
    }

    /**
     * @return string|null
     */
    public function getPersonalPhone(): ?string
    {
        return $this->personal_phone;
    }

    /**
     * @return string|null
     */
    public function getMobilePhone(): ?string
    {
        return $this->mobile_phone;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @return string|null
     */
    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    /**
     * @return string|null
     */
    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    /**
     * @return string|null
     */
    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return string[]
     */
    public function getExtraEmails(): array
    {
        return $this->extra_emails;
    }

    /**
     * @return LegalBase[]
     */
    public function getLegalBases(): array
    {
        return $this->legal_bases;
    }

    /**
     * @return Company|null
     */
    public function getCompany(): ?Company
    {
        return $this->company;
    }

    /**
     * @return Funnel|null
     */
    public function getFunnel(): ?Funnel
    {
        return $this->funnel;
    }
}
