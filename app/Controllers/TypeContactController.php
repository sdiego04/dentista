<?php

namespace app\Controllers;

use app\Entity\Client;
use app\Entity\Cnpj;
use app\Entity\Email;
use app\Entity\Profile;
use app\Entity\TypeContact;
use app\Entity\TypePerson;
use app\Repositories\ClientRepository;

use app\Repositories\TypeContactRepository;
use Exception;
use stdClass;

class TypeContactController extends Controller
{

    public function __construct(){}
    
    public function store(stdClass $params)
    {

        if (!isset($params->name) || empty($params->name)) {
            throw new Exception("Nome vazio ");
        }

        if ($response = TypeContactRepository::get_by_name($params->name)) {
            throw new Exception("Tipo de contato ja cadastrado");
        }

        $contact = new TypeContact($params);
        if (!$get_contact = TypeContactRepository::insert($contact)) {
            throw new Exception("Erro ao salvar o tipo de contato");
        }

        Controller::view('Dashboard');
    }

    public function form_add()
    {

        Controller::view('TypeContact/store');
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

        if (!$contact = TypeContactRepository::get($id)) {
            throw new Exception("Tipo de contato não encontrado!");
        }

        $contact->setStatus(0);

        if (!$response = TypeContactRepository::update($contact)) {
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

        if (!$contact = TypeContactRepository::get($id)) {
            throw new Exception("Tipo de contato não encontrado!");
        }

        $contact->setStatus(1);

        if (!$response = TypeContactRepository::update($contact)) {
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
