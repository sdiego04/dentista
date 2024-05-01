<?php

namespace app\Application\LegalPerson\UpdateLegalPerson;

use app\Domain\Entity\LegalPerson\LegalPerson;
use stdClass;

class UpdateLegalPersonDto{

    private int $id;
    private string $cnpj;
    private string $email;
    private string $name;
    private string $fantasy_name;
    private int $status;
    private ?int $parentid = null;
    
    public function __construct(int $id, stdClass $legalPerson)
    {
        $this->setId($id);
        $this->setCnpj($legalPerson->cnpj);
        $this->setName($legalPerson->name);
        $this->setEmail($legalPerson->email);
        $this->setFantasyName($legalPerson->fantasy_name);
        $this->setStatus($legalPerson->status);
        $this->setParentid($legalPerson->parentid);
    }


    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of cnpj
     */
    public function getCnpj(): string
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     */
    public function setCnpj(string $cnpj): self
    {
        $this->cnpj = $cnpj;

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
     * Get the value of fantasy_name
     */
    public function getFantasyName(): string
    {
        return $this->fantasy_name;
    }

    /**
     * Set the value of fantasy_name
     */
    public function setFantasyName(string $fantasy_name): self
    {
        $this->fantasy_name = $fantasy_name;

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
}
?>