<?php

namespace app\Entity;

class Cnpj{

    private ?string $cnpj = null;

    public function __construct(string $cnpj = null) {
        if(!is_null($cnpj)){
            $cnpj = $this->validateCnpj($cnpj);
        }
        
        $this->cnpj = $cnpj;
    }

    private function validateCnpj(string $cnpj):string
    {   
        $search = array("/", "-", ".");
        $cnpj = str_replace($search, "", $cnpj);

        if(strlen($cnpj) != 14){
            echo "Cnpj invalido";
            exit;
        }

        return $cnpj;
    }

    //TODO criar uma funcao que valide melhor o cnpj

  

    /**
     * Get the value of cnpj
     */
    public function getName(): ?string
    {
        return $this->cnpj;
    }
}


?>