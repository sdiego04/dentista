<?php

namespace app\Repositories;

use app\Services\ConnectionDB;
use PDO;


class CityRepository extends ConnectionDB
{

    public function __construct() {}


    public static function get(int $id):object | bool
    {
       $city_id = $id;
       
       $sql = "SELECT * FROM states WHERE city_id = {$city_id}";

       $connection = ConnectionDB::getConnection();
       $stmt = $connection->query($sql);

       $get_object = $stmt->fetch(PDO::FETCH_OBJ);
     
       return $get_object;
    }
}
