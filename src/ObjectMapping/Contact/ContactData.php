<?php

namespace Jetimob\RDStation\ObjectMapping\Contact;

use Jetimob\RDStation\ObjectMapping\Funnel\Funnel;

/**
 * Trait ContactData
 *
 * For empty value fields the following behavior will be adopted:
 *       String and Numbers	attributes will not be returned
 *       Array	an empty array will be returned []
 *       Boolean	Always true or false will be returned
 *
 * @package Jetimob\RDStation\ObjectMapping\Contact
 * @see https://developers.rdstation.com/en/reference/contacts
 */
trait ContactData
{
    /** @var string|null $uuid The unique uuid associated to each RD Station Contact. */
    protected ?string $uuid;

    /** @var string|null $name Name of the Contact. */
    protected ?string $name;

    /** @var string|null $mail Email of the Contact. */
    protected ?string $email;

    /** @var string|null $bio Notes about the Contact. */
    protected ?string $bio;

    /** @var string|null $website Website of the Contact. */
    protected ?string $website;

    /** @var string|null $job_title Job title of the Contact. */
    protected ?string $job_title;

    /** @var string|null $personal_phone Phone of the Contact. */
    protected ?string $personal_phone;

    /** @var string|null $mobile_phone Mobile phone of the Contact. */
    protected ?string $mobile_phone;

    /** @var string|null $city City of the Contact. */
    protected ?string $city;

    /** @var string|null $state State of the Contact. */
    protected ?string $state;

    /** @var string|null $country Country of the Contact. */
    protected ?string $country;

    /** @var string|null $twitter Twitter of the Contact. */
    protected ?string $twitter;

    /** @var string|null $facebook Facebook of the Contact. */
    protected ?string $facebook;

    /** @var string|null $linkedin Linkedin of the Contact. */
    protected ?string $linkedin;

    /** @var string[] $tags Tags of the Contact. */
    protected array $tags;

    /** @var string[] $extra_emails Extra emails of the Contact. */
    protected array $extra_emails;

    /** @var \Jetimob\RDStation\ObjectMapping\Contact\LegalBase[] Legal Bases of the Contact. */
    protected array $legal_bases;

    /** @var Company|null $company */
    protected ?Company $company;

    /** @var Funnel|null $funnel */
    protected ?Funnel $funnel;
}
