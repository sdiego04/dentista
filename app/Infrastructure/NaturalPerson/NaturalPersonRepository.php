<?php

namespace app\Infrastructure\NaturalPerson;

use app\Domain\Entity\NaturalPerson\INaturalPersonRepository;
use app\Domain\Entity\NaturalPerson\NaturalPerson;
use app\Services\ConnectionDB;
use PDO;
use stdClass;

class NaturalPersonRepository extends ConnectionDB implements INaturalPersonRepository{

    public function __construct(){}

    public function save(NaturalPerson $legalPerson): int|bool
    {   
        $sql = "";

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    } 

    public function update(NaturalPerson $legalPerson)
    {
        $sql = "";
   
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

    public function delete(int $id, string $cpf):int|bool
    {
        $sql = "UPDATE legal_person 
        SET status = 2,  updated_at = '" . date('Y-m-d H:i:s') . "' 
        WHERE id = " . $id . " AND cnpj = {$cpf}";        
        
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    }

    public function inative(int $id, string $cpf):int|bool
    {
        $sql = "UPDATE legal_person 
        SET status = 0,  updated_at = '" . date('Y-m-d H:i:s') . "' 
        WHERE id = " . $id . " AND cnpj = {$cpf}";
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    } 

    public function active(int $id, string $cpf):int|bool{
        $sql = "UPDATE legal_person 
        SET status = 1,  updated_at = '" . date('Y-m-d H:i:s') . "' 
        WHERE id = " . $id . " AND cnpj = {$cpf}";
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    }

    public function getForCnpj(string $cpf):NaturalPerson|false
    {
        $sql = "SELECT * from legal_person WHERE cnpj = '{$cpf}'";
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->query($sql);
        $get_object = $stmt->fetch(PDO::FETCH_OBJ);

        if(!$get_object){
            return $get_object;
        }
        
        return $this->mappingLegalPerson($get_object);
    } 

    private function mappingLegalPerson(stdClass $get_object):NaturalPerson
    {
        $legalPerson = new NaturalPerson($get_object);

        return $legalPerson;
    }

}
?>