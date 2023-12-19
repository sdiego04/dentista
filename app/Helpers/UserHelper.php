<?php

namespace app\Helpers;

use app\Models\User;
use Exception;
use stdClass;

class UserHelper {

    public function buildDataObject(User $user):stdClass
    {
        $object_user = new stdClass();

        $object_user->name = $user->getName();
        $object_user->lastname = $user->getLastName();
        $object_user->fullname = $user->getName() . " " . $user->getLastName();
        $object_user->cpf = $user->getCpf()->getName();
        $object_user->cnpj = $user->getCnpj()->getName();
        $object_user->email = $user->getEmail()->getName();
        $object_user->cro = $user->getCro();
        $object_user->gender = $user->getGender();
        $object_user->birth_date = date('d-m-Y', strtotime($user->getBirthDate()));
        $object_user->status = $user->getStatus();
        $object_user->status_text = $user->getStatus() == 1 ? "Ativo" : "Inativo";

        return $object_user;
    }

}
