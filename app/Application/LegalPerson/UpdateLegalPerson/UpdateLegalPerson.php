<?php

namespace app\Application\LegalPerson\UpdateLegalPerson;

use app\Domain\Entity\LegalPerson\ILegalPersonRepository;
use app\Domain\Entity\LegalPerson\LegalPerson;

class UpdateLegalPerson{

    private ILegalPersonRepository $personRepository;

    public function __construct(ILegalPersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function execute(UpdateLegalPersonDto $updateLegalPersonDto)
    {
        $buildlegalperson = (object) array(
            "id" => $updateLegalPersonDto->getId(),
            "cnpj" => $updateLegalPersonDto->getCnpj(),
            "email" => $updateLegalPersonDto->getEmail(),
            "name" => $updateLegalPersonDto->getName(),
            "fantasy_name" => $updateLegalPersonDto->getFantasyName(),
            "status" => $updateLegalPersonDto->getStatus(),
            "parentid" => $updateLegalPersonDto->getParentid()
        );

        $this->personRepository->update(new LegalPerson($buildlegalperson));
    }
}
?>