<?php

namespace app\Models;


class ClientContact{

    private int $client_contact_id;
    private int $type_contact_id;
    private int $client_id;
    private string $contact;
    private bool $status;

    public function __construct(Client $client, TypeContact $type_contact) {
        $this->setClientId($client->getClientId());
        $this->setTypeContactId($type_contact->getTypeContactId());
    }

    /**
     * Get the value of client_contact_id
     */
    public function getClientContactId(): int
    {
        return $this->client_contact_id;
    }

    /**
     * Set the value of client_contact_id
     */
    public function setClientContactId(int $client_contact_id): self
    {
        $this->client_contact_id = $client_contact_id;

        return $this;
    }

    /**
     * Get the value of contact
     */
    public function getContact(): string
    {
        return $this->contact;
    }

    /**
     * Set the value of contact
     */
    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of type_contact_id
     */
    public function getTypeContactId(): int
    {
        return $this->type_contact_id;
    }

    /**
     * Set the value of type_contact_id
     */
    public function setTypeContactId(int $type_contact_id): self
    {
        $this->type_contact_id = $type_contact_id;

        return $this;
    }

    /**
     * Get the value of client_id
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * Set the value of client_id
     */
    public function setClientId(int $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }
}


?>