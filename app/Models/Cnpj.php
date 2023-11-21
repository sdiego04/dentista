<?php

namespace app\Models;

class Cnpj{

    private string $cnpj;

    public function __construct(string $cnpj) {
        $this->validateCnpj($cnpj);
        $this->cnpj = $cnpj;
    }

    private function validateCnpj(string $cnpj)
    {   
        $search = array("/", "-", ".");
        $cnpj = str_replace($search, "", $cnpj);

        if(strlen($cnpj) != 14){
            echo "Cnpj invalido";
            exit;
        }
    }

    /**
     * Get the value of cnpj
     */
    public function getName(): string
    {
        return $this->cnpj;
    }
}


?>