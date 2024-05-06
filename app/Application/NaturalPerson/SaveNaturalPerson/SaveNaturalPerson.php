<?php


namespace app\Application\NaturalPerson\SaveNaturalPerson;

use app\Domain\Entity\NaturalPerson\INaturalPersonRepository;
use app\Domain\Entity\NaturalPerson\NaturalPerson;
use stdClass;

class SaveNaturalPerson{
    private INaturalPersonRepository $naturalPersonRepository;

    public function __construct(INaturalPersonRepository $naturalPersonRepository)
    {
        $this->naturalPersonRepository = new INaturalPersonRepository();
    }

    public function execute(SaveNaturalPersonDto $saveNaturalPersonDto){
        $teste = new stdClass();
        $this->naturalPersonRepository->save(new NaturalPerson($teste));
    }
}

?>