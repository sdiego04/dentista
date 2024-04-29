<?php

namespace app\Infrastructure\LegalPerson;

use app\Domain\Entity\LegalPerson\ILegalPersonRepository;
use app\Domain\Entity\LegalPerson\LegalPerson;
use app\Services\ConnectionDB;
use PDO;
use stdClass;

class LegalPersonRepository extends ConnectionDB implements ILegalPersonRepository{

    public function __construct(){}

    public function save(LegalPerson $legalPerson): int|bool
    {   
        $sql = "INSERT INTO legal_person (cnpj, email, fantasy_name,
        name, password, status, parent_id) 
        values ('{$legalPerson->getCnpj()}', '{$legalPerson->getEmail()}', 
        '{$legalPerson->getFantasyName()}', '{$legalPerson->getName()}', 
        '{$legalPerson->getPassword()}', {$legalPerson->getStatus()}, 
        {$legalPerson->getParentid()})";

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    } 

    public function update(LegalPerson $legalPerson){} 

    public function all():array|false
    {
        $sql = "SELECT * FROM legal_person";

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->query($sql);
     
        if(!$response = $stmt->fetchAll(PDO::FETCH_OBJ)){
            return false;
        }
        
        return $response;
    } 

    public function delete(string $cnpj):int|bool
    {
        $sql = "UPDATE legal_person SET status = 0,  updated_at = '" . date('Y-m-d H:i:s') . "' WHERE cnpf = " . $cnpj;
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    }

    public function inative(string $cnpj):int|bool
    {

        $sql = "UPDATE legal_person SET status = 0,  updated_at = '" . date('Y-m-d H:i:s') . "' WHERE cnpf = " . $cnpj;
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    } 

    public function active(string $cnpj):int|bool{
        $sql = "UPDATE legal_person SET status = 1,  updated_at = '" . date('Y-m-d H:i:s') . "' WHERE cnpf = " . $cnpj;
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    }

    public function getForCnpj(string $cnpj):LegalPerson|false
    {
        $sql = "SELECT * from legal_person WHERE cnpj = '{$cnpj}'";
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->query($sql);
        $get_object = $stmt->fetch(PDO::FETCH_OBJ);
       
        if(!$get_object){
            return $stmt;
        }
        
        return $this->mappingLegalPerson($get_object);
    } 

    private function mappingLegalPerson(stdClass $get_object):LegalPerson
    {
        $legalPerson = new LegalPerson($get_object);

        return $legalPerson;
    }

}
?>