<?php

namespace app\Models;

use app\Repositories\TypePersonRepository;
use stdClass;

class TypePerson
{
    private int $type_person_id;
    private string $name;
    private bool $status;

    public function __construct(int $type_person_id) {
        $get_profile = new stdClass();
        if(!$get_profile = TypePersonRepository::get($type_person_id)){
            echo "Não existe esse tipo de pessoa cadastrado";
            exit;
        }
       
        $this->setTypePersonId($get_profile->type_person_id);
        $this->setName($get_profile->name);
        $this->setStatus($get_profile->status);
    }

    /**
     * Get the value of type_person_id
     */
    public function getTypePersonId(): int
    {
        return $this->type_person_id;
    }

    /**
     * Set the value of type_person_id
     */
    public function setTypePersonId(int $type_person_id): self
    {
        $this->type_person_id = $type_person_id;

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