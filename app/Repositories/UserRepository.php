<?php

namespace app\Repositories;

use app\Models\Cnpj;
use app\Models\Cpf;
use app\Models\Email;
use app\Models\User;
use app\Services\ConnectionDB;
use PDO;
use stdClass;

class UserRepository extends ConnectionDB
{

    public function __construct()
    {
    }


    public static function save(User $user): int|false
    {

        $sql = "INSERT INTO users INTO () VALUES ()";
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    }

    public static function all():array|bool
    {
        $sql = "SELECT * FROM users";

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->query($sql);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get(int $id): object|bool
    {
        $sql = "SELECT * from users WHERE user_id = {$id}";

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->query($sql);

        $get_object = $stmt->fetch(PDO::FETCH_OBJ);

        if (!$get_object) {
            return $get_object;
        }

        return new User($get_object);
    }

    public static function get_by_email(Email $email): object|bool
    {
        $sql = "SELECT * FROM users WHERE email = '" . $email->getName() . "'";
        $connection = ConnectionDB::getConnection();

        $stmt = $connection->query($sql);
        $get_object = $stmt->fetch(PDO::FETCH_OBJ);

        return $get_object;
    }

    /**
     * @property string email
     * @property string cpf
     * @property string cnpj
     * 
     * @return bool
     */
    public static function check_user_exist(stdClass $user):bool
    {
        $sql = "SELECT user_id FROM users 
        WHERE email = '" . $user->email . "' OR cpf = '".$user->cpf."' OR cnpj = '".$user->cnpj."'";

        $connection = ConnectionDB::getConnection();

        $stmt = $connection->query($sql);
        $get_object = $stmt->fetch(PDO::FETCH_OBJ);

        if(!$get_object){
            return false;
        }

        return true;
    }
}
