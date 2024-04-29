<?php

namespace app\Helpers;

use app\Domain\Entity\LegalPerson\LegalPerson;
use stdClass;

/*
function buildDataBatchObject(UserList $userlist): array
{
    $return_data = array();

    if ($userlist->length() == 0) {
        return $return_data;
    }

    for ($i = 0; $i < $userlist->length(); $i++) {
        $return_data[$i] = buildDataObject($userlist->getUser($i));
    }
    return $return_data;
}*/

function buildLegalPersonDataObject(LegalPerson $legalPerson): stdClass
{
    $object = new stdClass();

    $object->cnpj = $legalPerson->getCnpj();
    $object->email = $legalPerson->getEmail();
    $object->fantasy_name = $legalPerson->getFantasyName();

    return $object;
}
