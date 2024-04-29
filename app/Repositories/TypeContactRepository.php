<?php

namespace app\Repositories;

use app\Entity\TypeContact;
use app\Services\ConnectionDB;
use PDO;

class TypeContactRepository extends ConnectionDB
{

    public function __construct() {}

    public static function get_by_name(string $name):TypeContact | bool
    {
       $sql = "SELECT * FROM type_contacts WHERE name LIKE '%{$name}%'";

       $connection = ConnectionDB::getConnection();
       $stmt = $connection->query($sql);

       $get_object = $stmt->fetch(PDO::FETCH_OBJ);
      
       if(!$get_object){
         return $get_object;
       }

      return new TypeContact($get_object);
    }

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

    public static function insert(TypeContact $contact):object | bool
    {
       $sql = "INSERT INTO type_contacts (name, status, created_at)
        VALUES ('".$contact->getName()."', '".$contact->getStatus()."', 
        '".date("Y-m-d H:i:s")."');";

       $connection = ConnectionDB::getConnection();
       $stmt = $connection->exec($sql);
     
       return $stmt;
    }


    public static function update(TypeContact $contact):object | bool
    {
      $sql = "UPDATE type_contacts
      SET name = '".$contact->getName()."', status = '".$contact->getStatus()."'
      WHERE type_contact_id = {$contact->getTypeContactId()}";

      $connection = ConnectionDB::getConnection();
      $stmt = $connection->exec($sql);
     
      return $stmt;
    }
}
