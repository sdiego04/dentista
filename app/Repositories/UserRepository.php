<?php

namespace app\Repositories;

use app\Models\Email;
use app\Services\ConnectionDB;
use PDO;
use stdClass;

class UserRepository extends ConnectionDB{

    public function __construct() {

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