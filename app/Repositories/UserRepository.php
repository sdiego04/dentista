<?php

namespace app\Repositories;

use app\Models\Email;
use app\Models\User;
use app\Services\ConnectionDB;
use PDO;
use stdClass;

class UserRepository extends ConnectionDB{

    public function __construct() {}

    public static function get(int $id):object|bool
    {
        $sql = "SELECT * from users WHERE user_id = {$id}";

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->query($sql);
 
        $get_object = $stmt->fetch(PDO::FETCH_OBJ);
       
        if(!$get_object){
          return $get_object;
        }
       
       return new User($get_object);
    }

    public static function get_by_email(Email $email):object|bool
    {
        $sql = "SELECT * FROM users WHERE email = '".$email->getName()."'";
        $connection = ConnectionDB::getConnection();

        $stmt = $connection->query($sql);
        $get_object = $stmt->fetch(PDO::FETCH_OBJ);
     
        return $get_object;
    }
}

?>