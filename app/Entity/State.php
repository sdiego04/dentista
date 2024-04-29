<?php

namespace app\Entity;

use app\Repositories\StateRepository;
use stdClass;

class State{

    private int $state_id;
    private string $initials;
    private string $name;
    private bool $status;

    public function __construct(int $state_id =  null) {
        if(is_integer($state_id)){
            $get_state = new stdClass();
            if($get_state = StateRepository::get($state_id)){
                $this->setStateId($get_state->state_id);
                $this->setStatus($get_state->status);
                $this->setName($get_state->name);
                $this->setInitials($get_state->name);
            }
        }
    }


    /**
     * Get the value of state_id
     */
    public function getStateId(): int
    {
        return $this->state_id;
    }

    /**
     * Set the value of state_id
     */
    public function setStateId(int $state_id): self
    {
        $this->state_id = $state_id;

        return $this;
    }

    /**
     * Get the value of initials
     */
    public function getInitials(): string
    {
        return $this->initials;
    }

    /**
     * Set the value of initials
     */
    public function setInitials(string $initials): self
    {
        $this->initials = $initials;

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
}



?>