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
        values (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = ConnectionDB::getConnection()->prepare($sql);
        $stmt->bindValue(1, $legalPerson->getCnpj());
        $stmt->bindValue(2, $legalPerson->getEmail());
        $stmt->bindValue(3, $legalPerson->getFantasyName());
        $stmt->bindValue(4, $legalPerson->getName());
        $stmt->bindValue(5, $legalPerson->getPassword());
        $stmt->bindValue(6, $legalPerson->getStatus());
        $stmt->bindValue(7, $legalPerson->getParentid());
        $stmt->bindValue(8, date('Y-m-d H:i:s'));

        $response = $stmt->execute();

        return $response;
    } 

    public function update(LegalPerson $legalPerson)
    {
        $sql = "UPDATE legal_person 
        SET name = ?, fantasy_name = ?, 
        status = ?, parent_id = ?, updated_at = ? 
        WHERE id = ? AND cnpj = ?";
   
        $stmt = ConnectionDB::getConnection()->prepare($sql);
        $stmt->bindValue(1, $legalPerson->getName());
        $stmt->bindValue(2, $legalPerson->getFantasyName());
        $stmt->bindValue(3, $legalPerson->getStatus());
        $stmt->bindValue(4, $legalPerson->getParentid());
        $stmt->bindValue(5, date('Y-m-d H:i:s'));
        $stmt->bindValue(6, $legalPerson->getId());
        $stmt->bindValue(7, $legalPerson->getCnpj());

        $response = $stmt->execute();

        return $response;
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

    public function delete(int $id, string $cnpj):int|bool
    {
        $sql = "UPDATE legal_person 
        SET status = 2,  updated_at = ?
        WHERE id = ? AND cnpj = ?";        
        
        $stmt = ConnectionDB::getConnection()->prepare($sql);
        $stmt->bindValue(1,  date('Y-m-d H:i:s'));
        $stmt->bindValue(2, $id);
        $stmt->bindValue(3, $cnpj);

        $response = $stmt->execute();

        return $response;
    }

    public function inative(int $id, string $cnpj):int|bool
    {
        $sql = "UPDATE legal_person 
        SET status = 0,  updated_at = ?
        WHERE id = ? AND cnpj = ?";

        $stmt = ConnectionDB::getConnection()->prepare($sql);
        $stmt->bindValue(1, date('Y-m-d H:i:s'));
        $stmt->bindValue(2, $id);
        $stmt->bindValue(3, $cnpj);

        $response = $stmt->execute();

        return $response;
    } 

    public function active(int $id, string $cnpj):int|bool
    {
        $sql = "UPDATE legal_person 
        SET status = 1,  updated_at = ? 
        WHERE id = ? AND cnpj = ? ";
        
        $stmt = ConnectionDB::getConnection()->prepare($sql);
        $stmt->bindValue(1, date('Y-m-d H:i:s'));
        $stmt->bindValue(2, $id);
        $stmt->bindValue(3, $cnpj);

        $response = $stmt->execute();

        return $response;
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