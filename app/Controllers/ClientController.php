<?php

namespace app\Controllers;

use app\Entity\Client;
use app\Entity\Cnpj;
use app\Entity\Email;
use app\Entity\Profile;
use app\Entity\TypePerson;
use app\Repositories\ClientRepository;
use app\Repositories\StateRepository;
use Exception;
use stdClass;

class ClientController extends Controller
{

    public function __construct(){}
    
    public function store(stdClass $params)
    {

        if (!isset($params->email) || empty($params->email)) {
            throw new Exception("Email vazio ");
        }

        if ($response = ClientRepository::get_by_email(new Email($params->email))) {
            throw new Exception("Email ja cadastrado");
        }

        $client = new Client($params);
        if (!$get_client = ClientRepository::insert($client)) {
            throw new Exception("Erro ao salvar o cliente");
        }

        Controller::view('Dashboard');
    }

    public function form_add()
    {
        $states = StateRepository::all();

        Controller::view('Client/store', array('states' => $states));
    }

    public function list()
    {
       
        $client_list = ClientRepository::all();

        Controller::view("Client/list", array('data' => $client_list));
    }

    public function delete(stdClass $params)
    {
        $id = $params->id;
        if (empty($id)) {
            throw new Exception("Parametro vazio");
        }

        if (!$client = ClientRepository::get($id)) {
            throw new Exception("Cliente não encontrado!");
        }

        $client->setStatus(0);

        if (!$response = ClientRepository::update($client)) {
            throw new Exception("Erro ao ativar o cliente!");
        }

        $this->list();
    }

    public function actived(stdClass $params)
    {
        $id = $params->id;
        if (empty($id)) {
            throw new Exception("Parametro vazio");
        }

        if (!$client = ClientRepository::get($id)) {
            throw new Exception("Cliente não encontrado!");
        }

        $client->setStatus(1);

        if (!$response = ClientRepository::update($client)) {
            throw new Exception("Erro ao ativar o cliente!");
        }

        $this->list();
    }


    public function form_update(stdClass $params)
    {
        if(!isset($params->id) || empty($params->id)){
            throw new Exception("Parametro não encontrado!");
        }
        
        if(!$get_client = ClientRepository::get($params->id)){
            throw new Exception("Cliente não encontrado!");
        }
        
        $client = new stdClass();
        $client->client_id = $get_client->getClientId();
        $client->name = $get_client->getName();
        $client->lastname = $get_client->getLastname();
        $client->email = $get_client->getEmail()->getName();
        $client->password = $get_client->getPassword();
        $client->cpf = $get_client->getCpf()->getName();
        $client->cnpj = $get_client->getCnpj()->getName();
        $client->gender = $get_client->getGender();
        $client->rg = $get_client->getRg();
        $client->marital_status = $get_client->getMaritalStatus();
        $client->occupation = $get_client->getOccupation();
        $client->date_birh_date = $get_client->getBirthDate();
        $client->profile_id = $get_client->getProfile()->getId();
        $client->type_person_id = $get_client->getTypePerson()->getTypePersonId();

        Controller::view('Client/update', array($client));
    }

    public function update(stdClass $params)
    {
        if(!isset($params->id) || empty($params->id)){
            throw new Exception("Parametro não encontrado!");
        }

        if(!$get_client = ClientRepository::get($params->id)){
            throw new Exception("Cliente não encontrado!");
        }

        $get_client->setName($params->name);
        $get_client->setLastname($params->lastname);
        $get_client->setPassword(password_hash($params->password, PASSWORD_DEFAULT));
        $get_client->setCnpj(new Cnpj($params->cnpj));
        $get_client->setGender($params->gender);
        $get_client->setMaritalStatus($params->marital_status);
        $get_client->setOccupation($params->occupation);
        $get_client->setProfile(new Profile($params->profile_id));
        $get_client->setTypePerson(new TypePerson($params->type_person_id));
    
        if(!$response = ClientRepository::update($get_client)){
            throw new Exception("Falha ao atualizar"); 
        }
      
        $this->list();
    }
}
