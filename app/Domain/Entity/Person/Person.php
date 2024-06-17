<?php

namespace app\Domain\Entity\Person;

use app\Domain\Entity\Email\Email;
use app\Domain\Entity\Password\Password;

abstract class Person
{
    private ?int $id = null;
    private string $firstName;
    private string $lastName;
    private Email $email;
    private Password $password;
    private int $status = 0;
    private ?int $parentId = null;

    public function __construct(
        int $id, 
        string $firstName, 
        string $lastName, 
        string $email,
        string $password,
        int $status,
        ?int $parentId = null)
    {
        $this->setId($id);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail(new Email($email));
        $this->setPassword(new Password($password));
        $this->setStatus($status);
        $this->setParentId($parentId);
        
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


    /**
     * Get the value of parentId
     */ 
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set the value of parentId
     *
     * @return  self
     */ 
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword():Password
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword(Password $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail():Email
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail( Email $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}