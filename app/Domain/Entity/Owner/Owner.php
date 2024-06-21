<?php

namespace app\Domain\Entity\Owner;

use app\Domain\Entity\Email\Email;
use app\Domain\Entity\NaturalPerson\NaturalPerson;
use app\Domain\Entity\Password\Password;
use stdClass;

class Owner extends NaturalPerson{

    private int $profileId;
    private Email $email;
    private Password $password;

    public function __construct(stdClass $params)
    {
        parent::__construct($params);
        $this->setParams($params);
    }

    private function setParams(stdClass $params)
    {
        $this->setProfileId($params->profile_id);
        $this->setEmail(new Email($params->email));
        $this->setPassword(new Password($params->password));
    }

    /**
     * Get the value of profileId
     */ 
    public function getProfileId():int
    {
        return $this->profileId;
    }

    /**
     * Set the value of profileId
     *
     * @return  self
     */ 
    public function setProfileId(int $profileId)
    {
        $this->profileId = $profileId;

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
    public function setEmail(Email $email)
    {
        $this->email = $email;

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
}