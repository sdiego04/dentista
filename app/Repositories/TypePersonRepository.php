<?php

namespace app\Repositories;

use app\Services\ConnectionDB;
use PDO;


class TypePersonRepository extends ConnectionDB
{

    public function __construct() {
    }


    public static function get(int $id):object | bool
    {
       $type_person_id = $id;
       
       $sql = "SELECT * FROM type_persons WHERE type_person_id = {$type_person_id}";

       $connection = ConnectionDB::getConnection();
       $stmt = $connection->query($sql);

       $get_object = $stmt->fetch(PDO::FETCH_OBJ);
     
       return $get_object;
    }
}
