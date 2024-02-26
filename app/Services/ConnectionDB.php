<?php


namespace app\Services;

use PDO;

abstract class ConnectionDB extends PDO{

    public static function getConnection(array $options = null){

        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        
        return new PDO($dsn, DB_USER, DB_PASSWORD, $options);
    }
}



?>