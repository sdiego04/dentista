<?php

namespace app\Models;

use app\Repositories\CityRepository;
use stdClass;

class City{

    private int $city_id;
    private State $state;
    private string $name;
    private bool $status;

    public function __construct(int $city_id =  null) {
        if(is_integer($city_id)){
            $get_city = new stdClass();
            if($get_city = CityRepository::get($city_id)){
                $this->setCityId($get_city->city_id);
                $this->setName($get_city->name);
                $this->setStatus($get_city->status);
                $this->setState(new State($get_city->state_id));
            }
        }
    }


    /**
     * Get the value of state
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * Set the value of state
     */
    public function setState(State $state): self
    {
        $this->state = $state->getStateId();

        return $this;
    }

    /**
     * Get the value of city_id
     */
    public function getCityId(): int
    {
        return $this->city_id;
    }

    /**
     * Set the value of city_id
     */
    public function setCityId(int $city_id): self
    {
        $this->city_id = $city_id;

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