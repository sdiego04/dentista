<?php

namespace app\Domain\Entity\Password;


class Password{

    private string $password;
    
    public function __construct(string $password)
    {
        $validMD5 = $this->isValidMd5($password);
        if(!$validMD5 && is_bool($validMD5)){
            throw new \InvalidArgumentException("Formato de senha invalida", 1); 
        }

        $this->setPassword($password);
    }


    public static function isValidMd5(string $password):int|false
    {
        return preg_match('/^[a-f0-9]{32}$/', $password);
    }

    public function getEncripty():string
    {
        return self::encripty($this->getPassword());
    }

    public static function encripty(string $password):string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function decripty(string $password):bool
    {
        return password_verify($password, PASSWORD_DEFAULT);
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}