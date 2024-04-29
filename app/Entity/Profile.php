<?php
namespace app\Entity;

use app\Repositories\ProfileRepository;
use stdClass;

class Profile
{

    private int $id;
    private ?string $control_id;
    private string $name;
    private int $level;
    private int $status;


    public function __construct(int $id) {
        
        $this->validateProfile($id);
    }


    private function validateProfile(int $id):void
    {
        $get_profile = new stdClass();

        if(!$get_profile = ProfileRepository::get($id)){
            echo "Não existe profile cadastrado";
            exit;
        }

        $this->setId($get_profile->profile_id);
        $this->setName($get_profile->name);
        $this->setLevel($get_profile->level);
        $this->setStatus($get_profile->status);
    }

    /**
     * Get the value of control_id
     */
    public function getControlId(): ?string
    {
        return $this->control_id;
    }

    /**
     * Set the value of control_id
     */
    public function setControlId(?string $control_id): self
    {
        $this->control_id = $control_id;

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
     * Get the value of level
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * Set the value of level
     */
    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}

?>