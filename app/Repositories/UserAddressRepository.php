<?php

namespace app\Repositories;

use app\Entity\Email;
use app\Entity\User;
use app\Services\ConnectionDB;
use PDO;
use stdClass;

class UserAddressRepository extends ConnectionDB
{

    public function __construct(){}


    public static function inative(int $user_id): int|false
    {
        $sql = "UPDATE users SET status = 0 WHERE user_id = " . $user_id;

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    }


    public static function activate(int $user_id): int|false
    {
        $sql = "UPDATE users SET status = 1 WHERE user_id = " . $user_id;

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    }


    public static function update(User $user): int|false
    {
        $sql = "UPDATE users 
        SET type_person_id = '".$user->getTypePerson()->getTypePersonId()."', 
        profile_id = '".$user->getProfile()->getId()."', name = '".$user->getName()."',
        lastname = '".$user->getLastName()."', fantasy_name = '".$user->getFantasyName()."',
        cpf = '".$user->getCpf()->getName()."',cnpj = '".$user->getCnpj()->getName()."', 
        email = '".$user->getEmail()->getName()."', password = '".$user->getPassword()->getEncripty()."', 
        parent_id = '".$user->getParentId()."', cro = '".$user->getCro()."', gender = '".$user->getGender()."',
        birth_date = '".$user->getBirthDate()."', status = '".$user->getStatus()."',
        updated_at = '".date('Y-m-d H:i:s')."'  WHERE user_id = ".$user->getUserId()."";

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    }

    public static function save(User $user): int|false
    {
        $sql = "INSERT INTO users (type_person_id, profile_id, name, lastname,
                fantasy_name, cpf,cnpj, email, password, parent_id, cro, gender,
                birth_date, status, created_at) 
                VALUES (".$user->getTypePerson()->getTypePersonId().", ".$user->getProfile()->getId().",
                '".$user->getName()."', '".$user->getLastName()."', '".$user->getFantasyName()."',
                '".$user->getCpf()->getName()."', '".$user->getCnpj()->getName()."', '".$user->getEmail()->getName()."',
                '".$user->getPassword()->getEncripty()."', ".$user->getParentId().",
                '".$user->getCro()."', '".$user->getGender()."', '".$user->getBirthDate()."', ".$user->getStatus().", '".date('Y-m-d H:i:s')."')";

        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    }

    public static function all():array|bool
    {
        $sql = "SELECT * FROM users_addresses";

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
