<?php

namespace Jetimob\RDStation\Api\Contacts;

use Jetimob\Http\Method;
use Jetimob\Http\Request;

/**
 * Class GetContactByUuidRequest
 * Returns data about a specific Contact
 * @package Jetimob\RDStation\Api\Contacts
 * @see https://developers.rdstation.com/en/reference/contacts
 */
class GetContactByUuidRequest extends Request
{
    protected string $responseClass = ContactResponse::class;
    protected string $uuid;

    public function __construct(string $uuid)
    {
        parent::__construct();
        $this->uuid = $uuid;
    }

    public function method(): string
    {
        return Method::GET;
    }

    public function urn(): string
    {
        return 'platform/contacts/{uuid}';
    }
}
