<?php

namespace app\Application\LegalPerson\ActiveLegalPerson;

class ActiveLegalPersonDto{

    private int $id;
    private string $cnpj;

    public function __construct(int $id, string $cnpj)
    {
        $this->setId($id);
        $this->setCnpj($cnpj);
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
}
?>