<?php


namespace app\Api;

use app\Helpers\UserHelper;
use app\Models\User;
use app\Repositories\UserRepository;

use stdClass;

class UserController {

    private UserHelper $user_helper;

    public function __construct()
    {
        $this->user_helper = new UserHelper();    
    }

    /**
     * @property int paginate
     */
    public function index(stdClass $options)
    {   
        if(!isset($options->paginate)){
            $options->paginate = 1;
        }

        if(!$list = UserRepository::all($options)->paginate($options->paginate)){
            response(204, false, '', get_string('user_not_found'));
        }
        
        $userlist = $this->user_helper->buildDataBatchObject($list);

        response(200, true, $userlist, get_string('consult_success'), $list->getOptions());
    }

    public function get(stdClass $params)
    {   
        if(!isset($params->id) || empty($params->id)){
            response(400, false, '', 'Nenhum parametro informado!');
        }

        if(!$user = UserRepository::get($params->id)){
            response(204, false, '', get_string('user_not_found'));
        }

        $build_user = $this->user_helper->buildDataObject($user);

        response(200, true, $build_user, 'Consulta realizada com sucesso!');
    }

    public function store(stdClass $params)
    {
        if(!isset($params->email) || empty($params->email)
            || !isset($params->cpf) || empty($params->cpf)){
            response(400, false, '', 'Ha parametros faltando, favor verifique');
        }

        if(UserRepository::check_user_exist($params)){
            response(400, false, '', 'Usuario ja existe, favor entrar em contato com o suporte');
        }

        if(!UserRepository::save(new User($params))){
            response(404, false, '', 'Houve um erro ao salvar, favor entrar em contato com o suporte');
        }

        response(200, true, '', 'Usuario salvo com sucesso!');
    }

    public function update(stdClass $params)
    {  
        if(!isset($params->user_id) || empty($params->user_id)){
            response(400, false, '', 'Nenhum parametro informado!');
        }
       
        if(!$user = UserRepository::get($params->user_id)){
            response(204, false, '', get_string('user_not_found'));
        }

        if(!UserRepository::update(new User($params))){
            response(404, false, '', 'Houve um erro ao atualizar, favor entrar em contato com o suporte');
        }

        response(200, true, '', 'Usuario alterado com sucesso!');
    }

    public function inative(int $user_id)
    {
        if(!$user = UserRepository::get($user_id)){
            response(204, false, '', get_string('user_not_found'));
        }

        if(!UserRepository::inative($user_id)){
            response(404, false, '', 'Houve um erro ao inativar o usuario, favor entrar em contato com o suporte');
        }

        response(200, true, '', 'Usuario inativado com sucesso!');
    }

}


