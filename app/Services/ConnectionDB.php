<?php


namespace app\Services;

use PDO;

abstract class ConnectionDB extends PDO{

    public static function getConnection(array $options = null){
        //apagar apos os testes
        define('DB_NAME', 'dentista');
        define('DB_HOST', 'localhost');
        define('DB_USER', 'moodle');
        define('DB_PASSWORD', '!Q@W3e4r');

        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        
        return new PDO($dsn, DB_USER, DB_PASSWORD, $options);
    }
}



?>