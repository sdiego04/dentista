<?php

namespace app\Application\LegalPerson\ActiveLegalPerson;

use app\Domain\Entity\LegalPerson\ILegalPersonRepository;

class ActiveLegalPerson{
    
    private ILegalPersonRepository $personRepository;

    public function __construct(ILegalPersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function execute(ActiveLegalPersonDto $activeLegalPersonDto){
        $this->personRepository->active(
            $activeLegalPersonDto->getId(),
            $activeLegalPersonDto->getCnpj()
        );
    }
}

?>