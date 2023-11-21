<?php

namespace app\Repositories;

use app\Services\ConnectionDB;
use PDO;


class StateRepository extends ConnectionDB
{

    public function __construct() {}


    public static function get(int $id):object | bool
    {
       $state_id = $id;
       
       $sql = "SELECT * FROM states WHERE state_id = {$state_id}";

       $connection = ConnectionDB::getConnection();
       $stmt = $connection->query($sql);

       $get_object = $stmt->fetch(PDO::FETCH_OBJ);
     
       return $get_object;
    }

    public static function all():?array
    {
       $sql = "SELECT * FROM states";
      
       $connection = ConnectionDB::getConnection();
       $stmt = $connection->query($sql);
   
       return $stmt->fetchAll();
    }
}
