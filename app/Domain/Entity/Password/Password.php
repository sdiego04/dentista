<?php

namespace app\Domain\Entity\Password;


class Password{

    private string $password;
    
    /** HASH MD5 */
    public function __construct(string $password)
    {
        $validMD5 = $this->isValidMd5($password);
        if(!$validMD5 && is_bool($validMD5)){
            throw new \InvalidArgumentException("Formato de senha invalida", 1); 
        }

        $this->setValue($password);
    }


    public static function isValidMd5(string $password):bool
    {
        return (bool) preg_match('/^[a-f0-9]{32}$/', $password);

    }

    public function getEncripty():string
    {
        return self::encripty($this->getValue());
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
    public function getValue(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setValue(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}