<?php

namespace Jetimob\RDStation\Data\Contact;

use Jetimob\Http\Traits\Serializable;
use Jetimob\RDStation\Data\Funnel\Funnel;

class Contact
{
    use Serializable;
    use ContactDataTrait;

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

    /**
     * Returns a custom field (cf) by its name.
     *
     * @param string $field
     * @return mixed|null
     */
    public function getCustomField(string $field)
    {
        $field = $this->getCustomFieldName($field);
        $data = $this->hydrationData;

        return $data[$field] ?? null;
    }

    /**
     * Prefixes a field name with 'cf_' (a valid RD's custom field).
     *
     * @param $field
     * @return string
     */
    public function getCustomFieldName($field): string
    {
        $field = str_replace(' ', '_', $field);

        if (str_starts_with($field, 'cf_')) {
            return $field;
        }

        return "cf_$field";
    }

    /**
     * Returns an array of all custom fields names (properties prefixed by 'cf_')
     *
     * @return array
     */
    public function getAllCustomFields(): array
    {
        return array_filter(array_keys($this->hydrationData), static function ($entry) {
            return str_starts_with($entry, 'cf_');
        });
    }
}
