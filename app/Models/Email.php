<?php

namespace app\Models;

use Exception;

class Email {

    private string $email;

    
    public function __construct(string $email) 
    {
     
        $this->validateEmail($email);
        $this->setEmail($email);
    }

    public function validateEmail(string $email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception("Error Processing Request", 1);  
        }

        return true;
    }

    /**
     * Get the value of email
     */
    public function getName(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
?>