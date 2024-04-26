<?php

namespace app\Repositories;

use app\Collections\UserList;
use app\Models\Email;
use app\Models\User;
use app\Services\ConnectionDB;
use PDO;
use stdClass;


class UserRepository extends ConnectionDB
{
    public function __construct(){}


    /**
     * @property string order
     * @property int type_order 0 ASC/1 = DESC
     */
    public static function all(stdClass $options = null):UserList|bool
    {
        $sql = "SELECT * FROM users" . build_sql($options);
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->query($sql);
     
        if(!$response = $stmt->fetchAll(PDO::FETCH_OBJ)){
            return false;
        }
        
        $userlist = new UserList();
        foreach ($response as $user) {
           $userlist->addItem(new User($user));
        }
        
        return $userlist;
    }

    public static function inative(int $user_id): int|false
    {
        try {

            $sql = "UPDATE users SET status = 0,  updated_at = '".date('Y-m-d H:i:s')."' WHERE user_id = " . $user_id;
            $connection = ConnectionDB::getConnection();
            $stmt = $connection->exec($sql);
    
            return $stmt;

        } catch (\Throwable $th) {
           $th->getMessage();
        }

    }


    public static function activate(int $user_id): int|false
    {   
        try {
            $sql = "UPDATE users SET status = 1 ,  updated_at = '".date('Y-m-d H:i:s')."' WHERE user_id = " . $user_id;

            $connection = ConnectionDB::getConnection();
            $stmt = $connection->exec($sql);
    
            return $stmt;
        } catch (\Throwable $th) {
            $th->getMessage();
        }
    }

    
    public static function update(User $user): int|false
    {
        $sql = build_insert_sql($user);
        
        $connection = ConnectionDB::getConnection();
        $stmt = $connection->exec($sql);

        return $stmt;
    }

    public static function save(User $user): int|false
    {
        try {
            $sql = build_user_sql(CREATE, $user);
            $connection = ConnectionDB::getConnection();
            $stmt = $connection->exec($sql);

            return $stmt;

        } catch (\Throwable $th) {
            $th->getMessage();
        }
    }

    public static function get(int $id): User|bool
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
