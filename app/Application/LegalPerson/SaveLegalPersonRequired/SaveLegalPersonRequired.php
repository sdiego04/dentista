<?php

namespace app\Application\LegalPerson\SaveLegalPersonRequired;

use app\Domain\Entity\LegalPerson\ILegalPersonRepository;
use app\Domain\Entity\LegalPerson\LegalPerson;

class SaveLegalPersonRequired{

    private ILegalPersonRepository $legalPersonRepository;

    public function __construct(ILegalPersonRepository $legalPersonRepository)
    {
        $this->legalPersonRepository =  $legalPersonRepository;
    }

    public function execute(SaveLegalPersonRequiredDto $legalpersondto):void
    {
        $data = (object) array(
            'cnpj' => $legalpersondto->getCnpj(),
            'email' => $legalpersondto->getEmail(),
            'fantasy_name' => $legalpersondto->getFantasyName(),
            'name'=> $legalpersondto->getName(),
            'status' => $legalpersondto->getStatus(),
            'password' => $legalpersondto->getPassword(),
            'parentid' => $legalpersondto->getParentid()
        );

        $legalperson = LegalPerson::requireFields($data);

        $this->legalPersonRepository->save($legalperson);
    }
}

?>