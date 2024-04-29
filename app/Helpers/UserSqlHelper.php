<?php

use app\Entity\User;

function build_user_sql(string $action, User $user):string
{   
    if($action == CREATE){
        $sql = build_insert_sql($user);
    }

    if($action == READ){}
    if($action == UPDATE){}
    if($action == DELETE){}

    return $sql;
}

function build_insert_sql(User $user):string
{   
   
    $sql = "INSERT INTO users (type_person_id, profile_id, name, lastname,
        fantasy_name, cpf,cnpj, email, password, parent_id, cro, gender,
        birth_date, status, created_at) 
        VALUES (".$user->getTypePerson().", ".$user->getProfile().",
        '".$user->getName()."', '".$user->getLastName()."', '".$user->getFantasyName()."',
        '".$user->getCpf()->getName()."', '".$user->getCnpj()->getName()."' ,'".$user->getEmail()->getName()."',
        '".$user->getPassword()->getEncripty()."', '".$user->getParentId()."',
        '".$user->getCro()."', '".$user->getGender()."', '".$user->getBirthDate()."', ".$user->getStatus().", '".date('Y-m-d H:i:s')."')";


    return $sql;
}

function build_update_sql(User $user):string
{
    $sql = "UPDATE users 
        SET type_person_id = '".$user->getTypePerson()."', 
        profile_id = '".$user->getProfile()."', name = '".$user->getName()."',
        lastname = '".$user->getLastName()."', fantasy_name = '".$user->getFantasyName()."',
        cpf = '".$user->getCpf()->getName()."', email = '".$user->getEmail()->getName()."', password = '".$user->getPassword()->getEncripty()."', 
        parent_id = '".$user->getParentId()."', cro = '".$user->getCro()."', gender = '".$user->getGender()."',
        birth_date = '".$user->getBirthDate()."', status = '".$user->getStatus()."',
        updated_at = '".date('Y-m-d H:i:s')."'  WHERE user_id = ".$user->getUserId()."";

    return $sql;
}

