<?php

namespace app\Models;

use stdClass;

class TypeContact{

    private int $type_contact_id;
    private string $name;
    private bool $status;
    private string $created_at;
    
    public function __construct(stdClass $type_contact = null){
        if(!is_null($type_contact)){
            if(isset($type_contact->type_contact_id) && $type_contact->type_contact_id){
                $this->setTypeContactId($type_contact->type_contact_id);
            }

            $this->setName($type_contact->name);
            $this->setStatus($type_contact->status);
            $this->setCreatedAt($type_contact->created_at);
        }
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
    public function getStatus(): bool
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
     * Get the value of created_at
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     */
    public function setCreatedAt(string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}

?>