<?php


namespace app\Api;

use app\Helpers\UserHelper;
use app\Models\User;
use app\Repositories\UserRepository;
use app\Services\Api;
use app\Services\Autenticate;

use stdClass;

class UserController {

    private UserHelper $user_helper;

    public function __construct()
    {
        $this->user_helper = new UserHelper();    
    }

    public function index()
    {
        if(!$list = UserRepository::all()){
            Api::response(204, false, '', 'Nenhum usuario encontrado!');
        }

        $list = $this->user_helper->buildDataBatchObject($list);

        Api::response(200, true, $list, 'Consulta realizada com sucesso!');
    }

    public function get(stdClass $params)
    {   
        if(!isset($params->id) || empty($params->id)){
            Api::response(400, false, '', 'Nenhum parametro informado!');
        }

        if(!$user = UserRepository::get($params->id)){
            Api::response(204, false, '', 'Nenhum usuario encontrado!');
        }

        $build_user = $this->user_helper->buildDataObject($user);

        Api::response(200, true, $build_user, 'Consulta realizada com sucesso!');
    }

    public function store(stdClass $params)
    {
        if(!isset($params->email) || empty($params->email)
            || !isset($params->cpf) || empty($params->cpf)){
            Api::response(400, false, '', 'Ha parametros faltando, favor verifique');
        }

        if(UserRepository::check_user_exist($params)){
            Api::response(400, false, '', 'Usuario ja existe, favor entrar em contato com o suporte');
        }

        if(!UserRepository::save(new User($params))){
            Api::response(404, false, '', 'Houve um erro ao salvar, favor entrar em contato com o suporte');
        }

        Api::response(200, true, '', 'Usuario salvo com sucesso!');
    }

    public function update(stdClass $params)
    {  
        if(!isset($params->user_id) || empty($params->user_id)){
            Api::response(400, false, '', 'Nenhum parametro informado!');
        }
       
        if(!$user = UserRepository::get($params->user_id)){
            Api::response(204, false, '', 'Nenhum usuario encontrado!');
        }

        if(!UserRepository::update(new User($params))){
            Api::response(404, false, '', 'Houve um erro ao atualizar, favor entrar em contato com o suporte');
        }

        Api::response(200, true, '', 'Usuario alterado com sucesso!');
    }

}


