<?php

namespace app\Repositories;

use app\Models\Client;
use app\Models\Email;
use app\Models\TypeContact;
use app\Services\ConnectionDB;
use PDO;

class TypeContactRepository extends ConnectionDB
{

    public function __construct() {}

    public static function get(int $id):TypeContact | bool
    {
       $sql = "SELECT * FROM type_contacts WHERE type_contact_id = {$id}";

       $connection = ConnectionDB::getConnection();
       $stmt = $connection->query($sql);

       $get_object = $stmt->fetch(PDO::FETCH_OBJ);
      
       if(!$get_object){
         return $get_object;
       }

      return new TypeContact($get_object);
    
    }

    public static function all():?array
    {
       $sql = "SELECT * FROM type_contacts";
      
       $connection = ConnectionDB::getConnection();
       $stmt = $connection->query($sql);
   
       return $stmt->fetchAll();
    }

    public static function insert(Client $client):object | bool
    {
       $sql = "INSERT INTO clients (type_person_id, profile_id, name, email, 
        lastname, password, cpf, cnpj, parent_id, gender, rg, marital_status, 
        occupation, birth_date, status, created_at)
        VALUES (".$client->getTypePerson()->getTypePersonId().", ".$client->getProfile()->getId().", 
        '".$client->getName()."', '".$client->getEmail()->getName()."', '".$client->getLastname()."',  
        '".$client->getPassword()."', '".$client->getCpf()->getName()."', '".$client->getCnpj()->getName()."', 
        ".$client->getParentId().", '".$client->getGender()."', '".$client->getRg()."', '".$client->getMaritalStatus()."',
        '".$client->getOccupation()."', '".$client->getBirthDate()."', '".$client->getStatus()."', '".date("Y-m-d H:i:s")."');";

       $connection = ConnectionDB::getConnection();
       $stmt = $connection->exec($sql);
     
       return $stmt;
    }


    public static function update(Client $client):object | bool
    {
      $sql = "UPDATE clients
      SET type_person_id = ".$client->getTypePerson()->getTypePersonId().", profile_id = ".$client->getProfile()->getId().",
      name='".$client->getName()."', email='".$client->getEmail()->getName()."', lastname= '".$client->getLastname()."',
      password='".$client->getPassword()."', cpf='".$client->getCpf()->getName()."', cnpj='".$client->getCnpj()->getName()."',
      parent_id='".$client->getParentId()."', gender='".$client->getGender()."', rg='".$client->getRg()."',
      marital_status='".$client->getMaritalStatus()."', occupation='".$client->getOccupation()."', birth_date='".$client->getBirthDate()."',
      status='".$client->getStatus()."', updated_at='".date("Y-m-d H:i:s")."'
      WHERE client_id=".$client->getClientId()."";
     
      $connection = ConnectionDB::getConnection();
      $stmt = $connection->exec($sql);
     
      return $stmt;
    }
}
