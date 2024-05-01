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
        name, password, status, parent_id, created_at) 
        values ('{$legalPerson->getCnpj()}', '{$legalPerson->getEmail()}', 
        '{$legalPerson->getFantasyName()}', '{$legalPerson->getName()}', 
        '{$legalPerson->getPassword()}', {$legalPerson->getStatus()}, 
        {$legalPerson->getParentid()}, '".date('Y-m-d H:i:s')."')";

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    } 

    public function update(LegalPerson $legalPerson)
    {
        $sql = "UPDATE legal_person 
        SET name = '{$legalPerson->getName()}', fantasy_name = '{$legalPerson->getFantasyName()}', 
        status = {$legalPerson->getStatus()}, parent_id = {$legalPerson->getParentid()}, updated_at = '".date('Y-m-d H:i:s')."' 
        WHERE id = {$legalPerson->getId()} AND cnpj = '{$legalPerson->getCnpj()}'";
   
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    } 

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

    public function inative(int $id, string $cnpj):int|bool
    {
        $sql = "UPDATE legal_person 
        SET status = 0,  updated_at = '" . date('Y-m-d H:i:s') . "' 
        WHERE id = " . $id . " AND cnpj = {$cnpj}";
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    } 

    public function active(int $id, string $cnpj):int|bool{
        $sql = "UPDATE legal_person 
        SET status = 1,  updated_at = '" . date('Y-m-d H:i:s') . "' 
        WHERE id = " . $id . " AND cnpj = {$cnpj}";
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
            return $get_object;
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