<?php

namespace app\Entity;

use stdClass;

class Client{

    private int $client_id;
    private Profile $profile;
    private TypePerson $type_person;
    private string $name;
    private Email $email;
    private string $lastname;
    private string $password;
    private Cpf $cpf;
    private Cnpj $cnpj;
    private ?int $parent_id;
    private string $gender;
    private string $rg;
    private string $marital_status;
    private string $occupation;
    private string $birth_date;
    private ?bool $status;

    public function __construct(stdClass $client = null) {
        if($client != null){
            
            if(isset($client->client_id) && !empty($client->client_id)){
                $this->setClientId($client->client_id);
            }

            $this->setName($client->name);
            $this->setProfile(new Profile($client->profile_id));
            $this->setTypePerson(new TypePerson($client->type_person_id));
            $this->setLastname($client->lastname);
            $this->setEmail(new Email($client->email));
            $this->setPassword($client->password);
            $this->setCpf(new Cpf($client->cpf));
            $this->setCnpj(new Cnpj($client->cnpj));
            $this->setParentId($client->parent_id ?? 0);
            $this->setGender($client->gender);
            $this->setRg($client->rg);
            $this->setMaritalStatus($client->marital_status);
            $this->setOccupation($client->occupation);
            $this->setBirthDate($client->birth_date);
            $this->setStatus($client->status ?? 0);
        }
    }

    /**
     * Get the value of client_id
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * Set the value of client_id
     */
    public function setClientId(int $client_id): self
    {
        $this->client_id = $client_id;

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
     * Get the value of lastname
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
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

    /**
     * Get the value of gender
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     */
    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of rg
     */
    public function getRg(): string
    {
        return $this->rg;
    }

    /**
     * Set the value of rg
     */
    public function setRg(string $rg): self
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * Get the value of marital_status
     */
    public function getMaritalStatus(): string
    {
        return $this->marital_status;
    }

    /**
     * Set the value of marital_status
     */
    public function setMaritalStatus(string $marital_status): self
    {
        $this->marital_status = $marital_status;

        return $this;
    }

    /**
     * Get the value of occupation
     */
    public function getOccupation(): string
    {
        return $this->occupation;
    }

    /**
     * Set the value of occupation
     */
    public function setOccupation(string $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(Email $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of profile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set the value of profile
     */
    public function setProfile(Profile $profile): self
    {   
        $this->profile = $profile;
    
        return $this;
    }

    /**
     * Get the value of type_person
     */
    public function getTypePerson()
    {
        return $this->type_person;
    }

    /**
     * Set the value of type_person
     */
    public function setTypePerson(TypePerson $type_person): self
    {
        $this->type_person = $type_person;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf(): Cpf
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     */
    public function setCpf(Cpf $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of cnpj
     */
    public function getCnpj(): Cnpj
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     */
    public function setCnpj(Cnpj $cnpj): self
    {
        $this->cnpj = $cnpj;

        return $this;
    }


    /**
     * Get the value of parent_id
     */
    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    /**
     * Set the value of parent_id
     */
    public function setParentId(?int $parent_id): self
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    /**
     * Get the value of birth_date
     */
    public function getBirthDate(): string
    {
        return $this->birth_date;
    }

    /**
     * Set the value of birth_date
     */
    public function setBirthDate(string $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}


?>