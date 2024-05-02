<?php

namespace app\Application\LegalPerson\DeleteLegalPerson;

use app\Domain\Entity\LegalPerson\ILegalPersonRepository;

class DeleteLegalPerson{

    private ILegalPersonRepository $legalRepository;

    public function __construct(ILegalPersonRepository $legalRepository)
    {
        $this->legalRepository =  $legalRepository;
    }

    public function execute(DeleteLegalPersonDto $legalPerson)
    {
        $this->legalRepository->delete($legalPerson->getId(), $legalPerson->getCnpj());
    }
}


?>