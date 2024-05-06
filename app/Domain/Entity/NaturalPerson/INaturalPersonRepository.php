<?php

namespace app\Domain\Entity\NaturalPerson;

interface INaturalPersonRepository{

    public function save(NaturalPerson $naturalPerson):int|bool;

    /** @return NaturalPerson|false */
    public function getForCnpj(string $cpf):NaturalPerson|false;

    /** @return NaturalPerson[] */
    public function all():array|false;
    
    public function update(NaturalPerson $naturalPerson);

    public function delete(int $id, string $cpf):int|bool;

    public function inative(int $id, string $cpf):int|bool;

    public function active(int $id, string $cpf):int|bool;
}

?>