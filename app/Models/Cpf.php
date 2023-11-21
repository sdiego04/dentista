<?php

namespace app\Models;

class Cpf{

    private string $cpf;

    public function __construct(string $cpf) {
        $this->validateCpf($cpf);
        $this->cpf = $cpf;
    }

    private function validateCpf(string $cpf)
    {   
        $search = array("/", "-", ".");
        $cpf = str_replace($search, "", $cpf);

        if(strlen($cpf) != 11){
            echo "cpf invalido";
            exit;
        }
    }

    /**
     * Get the value of cpf
     */
    public function getName(): string
    {
        return $this->cpf;
    }
}


?>