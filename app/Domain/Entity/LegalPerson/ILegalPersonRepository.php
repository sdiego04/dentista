<?php


namespace app\Domain\Entity\LegalPerson;

interface ILegalPersonRepository{

    public function save(LegalPerson $legalPerson):int|bool;

    /** @return LegalPerson|false */
    public function getForCnpj(string $cnpj):LegalPerson|false;

    /** @return LegalPerson[] */
    public function all():array|false;
    
    public function update(LegalPerson $legalPerson);
    public function delete(string $cnpj):int|bool;
    public function inative(string $cnpj):int|bool;
    public function active(string $cnpj):int|bool;

}

?>
