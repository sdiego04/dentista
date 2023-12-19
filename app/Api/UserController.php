<?php


namespace app\Api;

use app\Helpers\UserHelper;
use app\Models\User;
use app\Repositories\UserRepository;
use app\Services\Api;
use Exception;
use stdClass;

class UserController {


    private UserHelper $user_helper;

    public function __construct()
    {
        $this->user_helper = new UserHelper();    
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


}


