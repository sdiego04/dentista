<?php

namespace app\Helpers;

use app\Collections\UserList;
use app\Entity\User;
use stdClass;

trait UserHelper
{
    function getTypePerson(string $document):int|bool
    {
        $document = $this->sanitizateDocument($document);
        if (strlen($document) == 11) {
            return NATURAL_PERSON;
        }
        
        if (strlen($document) == 14) {
            return LEGAL_PERSON;
        }

        return false;
    }
    
    function sanitizateDocument(string $document):string
    {
        return preg_replace('/[^0-9]/', '', $document);
    }

    function buildDataBatchObject(UserList $userlist): array
    {
        $return_data = array();

        if ($userlist->length() == 0) {
            return $return_data;
        }

        for ($i = 0; $i < $userlist->length(); $i++) {
            $return_data[$i] = $this->buildDataObject($userlist->getUser($i));
        }
        return $return_data;
    }

    function buildDataObject(User $user): stdClass
    {
        $object_user = new stdClass();

        $object_user->id = $user->getUserId();
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
