<?php

namespace app\Application\LegalPerson\InativeLegalPerson;

use app\Domain\Entity\LegalPerson\ILegalPersonRepository;

class InativeLegalPerson{
    
    private ILegalPersonRepository $personRepository;

    public function __construct(ILegalPersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function execute(InativeLegalPersonDto $inativeLegalPersonDto){
        $this->personRepository->inative(
            $inativeLegalPersonDto->getId(),
            $inativeLegalPersonDto->getCnpj()
        );
    }
}

?>