<?php

namespace app\Controllers;

use app\Models\Client;
use app\Models\Cnpj;
use app\Models\Email;
use app\Models\Profile;
use app\Models\TypePerson;
use app\Repositories\ClientRepository;
use app\Repositories\StateRepository;
use app\Repositories\TypeContactRepository;
use Exception;
use stdClass;

class TypeContactController extends Controller
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
       
        $type_contact_list = TypeContactRepository::all();

        Controller::view("TypeContact/list", array('data' => $type_contact_list));
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
 
        if(!$get_type_contact = TypeContactRepository::get($params->id)){
            throw new Exception("Cliente não encontrado!");
        }
        
        $type_contact = new stdClass();
        $type_contact->type_contact_id = $get_type_contact->getTypeContactId();
        $type_contact->name = $get_type_contact->getName();
        $type_contact->status = $get_type_contact->getStatus();

        Controller::view('TypeContact/update', array($type_contact));
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
