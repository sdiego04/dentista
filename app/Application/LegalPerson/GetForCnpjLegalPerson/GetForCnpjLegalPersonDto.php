<?php

namespace app\Application\LegalPerson\GetForCnpjLegalPerson;

class GetForCnpjLegalPersonDto{

    private string $cnpj;
    
    public function __construct(string $cnpj)
    {
        $this->setCnpj($cnpj);
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