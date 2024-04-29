<?php
namespace app\Application\LegalPerson\GetForCnpjLegalPerson;

use app\Domain\Entity\LegalPerson\ILegalPersonRepository;
use app\Domain\Entity\LegalPerson\LegalPerson;

class GetForCnpjLegalPerson
{

    private ILegalPersonRepository $legalPersonRepository;

    public function __construct(ILegalPersonRepository $legalPersonRepository)
    {
        $this->legalPersonRepository = $legalPersonRepository;
    }

    public function execute(GetForCnpjLegalPersonDto $dto):LegalPerson|bool
    {
        return $this->legalPersonRepository->getForCnpj($dto->getCnpj());
    }
}


?>