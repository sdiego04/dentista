<?php

namespace app\Api;

use app\Application\LegalPerson\GetForCnpjLegalPerson\GetForCnpjLegalPerson;
use app\Application\LegalPerson\GetForCnpjLegalPerson\GetForCnpjLegalPersonDto;
use app\Application\LegalPerson\SaveLegalPersonRequired\SaveLegalPersonRequired;
use app\Application\LegalPerson\SaveLegalPersonRequired\SaveLegalPersonRequiredDto;
use app\Infrastructure\LegalPerson\LegalPersonRepository;
use GuzzleHttp\Psr7\ServerRequest;
use stdClass;

use function app\Helpers\buildLegalPersonDataObject;

class LegalPersonController{

    private SaveLegalPersonRequired $saveLegalPersonRequired;
    private GetForCnpjLegalPerson $getForCnpjLegalPerson;
    private LegalPersonRepository $legalRepository;

    public function __construct()
    {
        $this->legalRepository = new LegalPersonRepository();

        $this->saveLegalPersonRequired = new SaveLegalPersonRequired($this->legalRepository);
        $this->getForCnpjLegalPerson = new GetForCnpjLegalPerson($this->legalRepository);
    }

    public function getForCnpj(ServerRequest $request)
    {   
        $cnpj = $request->getAttribute('doc');
        
        if(empty($cnpj)){
            response(400, false, '', get_string('required:params'));
        }

        $response = $this->getForCnpjLegalPerson->execute(new GetForCnpjLegalPersonDto($cnpj));
       
        if(!$response){
            response(204, false, '', get_string('warning:not_consult')); 
        }
       
        response(200, true, buildLegalPersonDataObject($response), get_string('success:consult'));
    }

    public function save()
    {
        $params = new stdClass();
        $params = json_decode(file_get_contents('php://input'));

        if(!isset($params->cnpj) || !isset($params->email)){
            response(400, false, '', get_string('required:params'));
        }

        $legalpersondto = new SaveLegalPersonRequiredDto(
            $params->cnpj,
            $params->email,
            $params->fantasy_name,
            $params->name,
            $params->status,
            $params->password,
            $params->parentid ?? null

        );
        
        $this->saveLegalPersonRequired->execute($legalpersondto);

        response(200, true, '', get_string('success:registration'));
    }
}


?>