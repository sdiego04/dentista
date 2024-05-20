<?php

namespace app\Api;

use app\Application\LegalPerson\ActiveLegalPerson\ActiveLegalPerson;
use app\Application\LegalPerson\ActiveLegalPerson\ActiveLegalPersonDto;
use app\Application\LegalPerson\DeleteLegalPerson\DeleteLegalPerson;
use app\Application\LegalPerson\DeleteLegalPerson\DeleteLegalPersonDto;
use app\Application\LegalPerson\GetForCnpjLegalPerson\GetForCnpjLegalPerson;
use app\Application\LegalPerson\GetForCnpjLegalPerson\GetForCnpjLegalPersonDto;
use app\Application\LegalPerson\InativeLegalPerson\InativeLegalPerson;
use app\Application\LegalPerson\InativeLegalPerson\InativeLegalPersonDto;
use app\Application\LegalPerson\SaveLegalPersonRequired\SaveLegalPersonRequired;
use app\Application\LegalPerson\SaveLegalPersonRequired\SaveLegalPersonRequiredDto;
use app\Application\LegalPerson\UpdateLegalPerson\UpdateLegalPerson;
use app\Application\LegalPerson\UpdateLegalPerson\UpdateLegalPersonDto;
use app\Infrastructure\LegalPerson\LegalPersonRepository;
use GuzzleHttp\Psr7\ServerRequest;
use stdClass;

use function app\Helpers\buildLegalPersonDataObject;

class LegalPersonController{

    private LegalPersonRepository $legalRepository;

    public function __construct()
    {
        $this->legalRepository = new LegalPersonRepository();
    }

    public function delete(ServerRequest $request)
    {
        $cnpj = $request->getAttribute('doc');
        if(empty($cnpj)){
            response(400, false, '', get_string('required:params'));
        }

        $usecase = new GetForCnpjLegalPerson($this->legalRepository);
        $legalperson = $usecase->execute(new GetForCnpjLegalPersonDto($cnpj));
        
        if(!$legalperson){
            response(204, false, '', get_string('warning:not_consult')); 
        }

        $usecase = new DeleteLegalPerson($this->legalRepository);
        $usecase->execute(new DeleteLegalPersonDto($legalperson->getId(), $legalperson->getCnpj()));

        response(200, true, '', get_string('success:delete'));


    }

    public function update()
    {
        $params = new stdClass();
        $params = json_decode(file_get_contents('php://input'));

        if(!isset($params->cnpj) || !isset($params->email)){
            response(400, false, '', get_string('required:params'));
        }

        $usecase = new GetForCnpjLegalPerson($this->legalRepository);
        $legalperson = $usecase->execute(new GetForCnpjLegalPersonDto($params->cnpj));
        
        if(!$legalperson){
            response(204, false, '', get_string('warning:not_consult')); 
        }

        $usecase = new UpdateLegalPerson($this->legalRepository);
        $response = $usecase->execute(new UpdateLegalPersonDto($legalperson->getId(), $params));

        response(200, true, '', get_string('success:update'));
    }

    public function active(ServerRequest $request)
    {
        $cnpj = $request->getAttribute('doc');
        if(empty($cnpj)){
            response(400, false, '', get_string('required:params'));
        }

        $usecase = new GetForCnpjLegalPerson($this->legalRepository);
        $response = $usecase->execute(new GetForCnpjLegalPersonDto($cnpj));

        if(!$response){
            response(204, false, '', get_string('warning:not_consult')); 
        }

        $usecase = new ActiveLegalPerson($this->legalRepository);
        $response = $usecase->execute(new ActiveLegalPersonDto($response->getId(), $response->getCnpj()));

        response(200, true, '', get_string('success:active'));
    }

    public function inative(ServerRequest $request)
    {
        $cnpj = $request->getAttribute('doc');
        if(empty($cnpj)){
            response(400, false, '', get_string('required:params'));
        }

        $usecase = new GetForCnpjLegalPerson($this->legalRepository);
        $response = $usecase->execute(new GetForCnpjLegalPersonDto($cnpj));

        if(!$response){
            response(204, false, '', get_string('warning:not_consult')); 
        }

        $usecase = new InativeLegalPerson($this->legalRepository);
        $response = $usecase->execute(new InativeLegalPersonDto($response->getId(), $response->getCnpj()));

        response(200, true, '', get_string('success:inative'));
    }

    public function getForCnpj(ServerRequest $request)
    {   
        $cnpj = $request->getAttribute('doc');
        
        if(empty($cnpj)){
            response(400, false, '', get_string('required:params'));
        }
        
        $usecase = new GetForCnpjLegalPerson($this->legalRepository);
        $response = $usecase->execute(new GetForCnpjLegalPersonDto($cnpj));
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
        
        $usecase = new SaveLegalPersonRequired($this->legalRepository);
        $usecase->execute($legalpersondto);

        response(200, true, '', get_string('success:registration'));
    }
}


?>