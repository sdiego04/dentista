<?php

namespace app\Models;


class UserAddress{

    private int $user_address_id;
    private int $user_id;
    private string $street;
    private int $number;
    private string $complement;
    private State $state;
    private City $city;
    private string $zip_code;
    private string $neighborhood;
    private bool $status;

    public function __construct(User $user, State $state, City $city) {
        $this->setUserId($user->getUserId());
        $this->setState($state);
        $this->setCity($city);
    } 

    /**
     * Get the value of user_address_id
     */
    public function getUserAddressId(): int
    {
        return $this->user_address_id;
    }

    /**
     * Set the value of user_address_id
     */
    public function setUserAddressId(int $user_address_id): self
    {
        $this->user_address_id = $user_address_id;

        return $this;
    }

    /**
     * Get the value of street
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * Set the value of street
     */
    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of number
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * Set the value of number
     */
    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of complement
     */
    public function getComplement(): string
    {
        return $this->complement;
    }

    /**
     * Set the value of complement
     */
    public function setComplement(string $complement): self
    {
        $this->complement = $complement;

        return $this;
    }


    /**
     * Get the value of zip_code
     */
    public function getZipCode(): string
    {
        return $this->zip_code;
    }

    /**
     * Set the value of zip_code
     */
    public function setZipCode(string $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    /**
     * Get the value of neighborhood
     */
    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    /**
     * Set the value of neighborhood
     */
    public function setNeighborhood(string $neighborhood): self
    {
        $this->neighborhood = $neighborhood;

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
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity(): City
    {
        return $this->city;
    }

    /**
     * Set the value of city
     */
    public function setCity(City $city): self
    {
        $this->city = $city->getCityId();

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