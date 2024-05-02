<?php 

namespace app\Domain\Entity\NaturalPerson;

use stdClass;

class NaturalPerson{
    
    private ?int $id;
    private string $name;
    private string $lastname;
    private string $cpf;
    private ?string $cro;
    private ?int $profileid;
    private ?int $typeperson;
    private string $email;
    private string $birthdate;
    private string $gender;
    private string $password;
    private ?int $parentid;
    private int $status;

    public function __construct(stdClass $param)
    {
        $this->setId($param->id ?? null);
        $this->setName($param->name);
        $this->setLastname($param->lastname);
        $this->setCpf($param->cpf);
        $this->setCro($param->cro);
        $this->setProfileid($param->profileid);
        $this->setTypeperson($param->typepersonid);
        $this->setEmail($param->email);
        $this->setBirthdate($param->birthdate);
        $this->setGender($param->gender);
        $this->setPassword($param->password);
        $this->setParentid($param->parentid);
        $this->setStatus($param->status);
    }


    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

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
     * Get the value of cpf
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     */
    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of cro
     */
    public function getCro(): ?string
    {
        return $this->cro;
    }

    /**
     * Set the value of cro
     */
    public function setCro(?string $cro): self
    {
        $this->cro = $cro;

        return $this;
    }

    /**
     * Get the value of profileid
     */
    public function getProfileid(): ?int
    {
        return $this->profileid;
    }

    /**
     * Set the value of profileid
     */
    public function setProfileid(?int $profileid): self
    {
        $this->profileid = $profileid;

        return $this;
    }

    /**
     * Get the value of typeperson
     */
    public function getTypeperson(): ?int
    {
        return $this->typeperson;
    }

    /**
     * Set the value of typeperson
     */
    public function setTypeperson(?int $typeperson): self
    {
        $this->typeperson = $typeperson;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
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

    /**
     * Get the value of birthdate
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     */
    public function setBirthdate(string $birthdate): self
    {
        $this->birthdate = $birthdate;

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
     * Get the value of parentid
     */
    public function getParentid(): ?int
    {
        return $this->parentid;
    }

    /**
     * Set the value of parentid
     */
    public function setParentid(?int $parentid): self
    {
        $this->parentid = $parentid;

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
}

?>