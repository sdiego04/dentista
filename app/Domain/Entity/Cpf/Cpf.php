<?php

namespace app\Domain\Entity\Cpf;

class Cpf{

    private string $cpf;
    
    public function __construct(string $cpf)
    {
        $validCpf = $this->isValidCpf($cpf);
        if(!$validCpf && is_bool($validCpf)){
            throw new \InvalidArgumentException("Formato ou cpf invalido", 400); 
        }
        
        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
        $this->setValue($cpf);
    }


    private function isValidCpf(string $cpf): bool
    {
        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

        if (strlen($cpf) != 11)
            return false;

        for ($j = 10, $i = 0, $sum = 0; $j >= 2; $j--, $i++)
            $sum += $cpf[$i] * $j;

        $remainder = $sum % 11;

        if ($cpf[9] != ($remainder < 2 ? 0 : 11 - $remainder))
            return false;

        for ($j = 11, $i = 0, $sum = 0; $j >= 2; $j--, $i++)
            $sum += $cpf[$i] * $j;

        $remainder = $sum % 11;

        return $cpf[10] == ($remainder < 2 ? 0 : 11 - $remainder);
    }


    /**
     * Get the value of cpf
     */ 
    public function getValue()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setValue($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }
}