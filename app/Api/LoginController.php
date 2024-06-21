<?php

namespace app\Api;

use app\Domain\Entity\Cnpj\Cnpj;
use app\Domain\Entity\Cpf\Cpf;
use app\Domain\Entity\Password\Password;
use app\Helpers\UserHelper;
use GuzzleHttp\Psr7\ServerRequest;

class LoginController
{   
    use UserHelper;

    public function index(ServerRequest $request)
    {
       $document = $request->getParsedBody()['document'] ?? "";
       $password = $request->getParsedBody()['password'] ?? "";

       if(empty($document) || empty($password)){
            response(400, false, array('message' => "Document and password are required"));
       }
  
       if(!$typePerson = $this->getTypePerson($document)){
            response(400, false, array('message' => "Invalid document"));
       }

       try {
        $password = new Password($password);
        if($typePerson == NATURAL_PERSON){
            $cpf = new Cpf($document);
            // $user = $this->userRepository->getForCpf($document);
        }
        if($typePerson == LEGAL_PERSON){
            $cnpj = new Cnpj($document);
            // $user = $this->userRepository->getForCnpj($document);
        }
       } catch (\Exception $e) {
           response($e->getCode(), false, array('message' => $e->getMessage()));
       }
       
    }
}