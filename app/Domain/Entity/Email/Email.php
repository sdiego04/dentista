<?php

namespace app\Domain\Entity\Email;

class Email
{
    private string $address = "";

    public function __construct(string $address)
    {
        if(!$this->isValidEmail($address)){
            throw new \InvalidArgumentException("Invalid email address");
        }

        $this->setAddress($address);
    }

    public function isValidEmail($address): bool
    {
        return filter_var($address, FILTER_VALIDATE_EMAIL);
    
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
}