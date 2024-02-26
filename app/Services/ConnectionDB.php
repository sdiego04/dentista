<?php


namespace app\Services;

use PDO;
const DESC = 1;
const ASC = 0;

abstract class ConnectionDB extends PDO{

    const PARAM_HOST = 'dfkpczjgmpvkugnb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    const PARAM_PORT = '3306';
    const PARAM_DB_NAME = 'biz8fzx872q68dw0';
    const PARAM_USER = 'bayjtywulyn8uyrl';
    const PARAM_DB_PASS = 'qufm4kbf0vyqbrcw';


    public static function getConnection(array $options = null){

        $dsn = "mysql:host=" . ConnectionDB::PARAM_HOST . ";dbname=" . ConnectionDB::PARAM_DB_NAME;
        
        return new PDO($dsn, ConnectionDB::PARAM_USER, ConnectionDB::PARAM_DB_PASS, $options);
    }
}



?>