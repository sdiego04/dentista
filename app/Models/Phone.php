<?php

namespace app\Models;

class Phone {

    private string $phone;

    public function __construct(string $phone)
    {
        $this->validatePhone($phone);
        $this->phone = $phone;
    }

    private function validatePhone(string $phone)
    {
        $phone = str_replace(array("-", "/", "(", ")"), "", $phone);
        if (strlen($phone) != 9) {
            echo "Tamanho de telefone invalido!";
            exit;
        }

        return true;
    }
    

    /**
     * Get the value of phone
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
}

?>