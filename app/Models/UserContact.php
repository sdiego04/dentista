<?php

namespace app\Models;

class UserContact{

    private int $user_contact_id;
    private int $type_contact_id;
    private int $user_id;
    private string $name;
    private bool $status;

    public function __construct(User $user, TypeContact $typeContact) {
        $this->setTypeContactId($typeContact->getTypeContactId());
        $this->setUserId($user->getUserId());
    }

    /**
     * Get the value of user_contact_id
     */
    public function getUserContactId(): int
    {
        return $this->user_contact_id;
    }

    /**
     * Set the value of user_contact_id
     */
    public function setUserContactId(int $user_contact_id): self
    {
        $this->user_contact_id = $user_contact_id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

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
     * Get the value of user_id
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}


?>