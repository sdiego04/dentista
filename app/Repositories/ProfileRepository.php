<?php

namespace app\Repositories;

use app\Services\ConnectionDB;
use PDO;


class ProfileRepository extends ConnectionDB
{

    public function __construct() {
    }


    public static function get(int $id):object | bool
    {
       $profile_id = $id;
       
       $sql = "SELECT * FROM profiles WHERE profile_id = {$profile_id}";

       $connection = ConnectionDB::getConnection();
       $stmt = $connection->query($sql);

       $get_object = $stmt->fetch(PDO::FETCH_OBJ);
     
       return $get_object;
    }
}
