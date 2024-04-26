<?php


namespace app\Api;

use app\Models\User;
use app\Repositories\UserRepository;
use GuzzleHttp\Psr7\ServerRequest;
use stdClass;

use function app\Helpers\buildDataBatchObject;
use function app\Helpers\buildDataObject;

class UserController {

    public function __construct(){}

   /**
     * @property string order
     * @property int page
     * @property int type_order 0 ASC/1 = DESC
     */
    public function index()
    {   
        $options = new stdClass();
        $options = json_decode(file_get_contents('php://input'));

        if(!isset($options->page) || $options->page <= 0 || !is_numeric($options->page)){
            $options->page = 1;
        }

        if(!$list = UserRepository::all($options)->paginate($options->page)){
            response(204, false, '', get_string('user_not_found'));
        }
        
        $userlist = buildDataBatchObject($list);

        response(200, true, $userlist, get_string('consult_success'), $list->getOptions());
    }

    public function get(ServerRequest $resquest)
    {   
        $id = $resquest->getAttribute('id');
        if(!isset($id) || empty($id)){
            response(400, false, '', 'Nenhum parametro informado!');
        }

        if(!is_numeric($id)){
            response(400, false, '', 'Formato invalido!');
        }

        if(!$user = UserRepository::get($id)){
            response(204, false, '', get_string('user_not_found'));
        }

        $build_user = buildDataObject($user);

        response(200, true, $build_user, 'Consulta realizada com sucesso!');
    }
    
    public function store()
    {
        $params = new stdClass();
        $params = json_decode(file_get_contents('php://input'));
 
        if(!isset($params->email) || empty($params->email)
            || !isset($params->cpf) || empty($params->cpf)){
            response(400, false, '', get_string('error:require_send_params'));
        }

        if(UserRepository::check_user_exist($params)){
            response(400, false, '', get_string('warning:user_exist'));
        }

        if(!UserRepository::save(new User($params))){
            response(404, false, '', get_string('error:save_user'));
        }

        response(200, true, '', get_string('sucess:save_user'));
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



    /**
     * @property int id
     */
    public function inative(ServerRequest $resquest)
    {   
        $userid = $resquest->getAttribute('id');
        if(!isset($userid) || empty($userid)){
            response(400, false, '', get_string('error:require_send_params'));
        }

        if(!$user = UserRepository::get($userid)){
            response(204, false, '', get_string('user_not_found'));
        }
        
        if(!UserRepository::inative($userid)){
            response(400, false, '', get_string('error:inative_user'));
        }

        response(200, true, '', get_string('success:inative_user'));
    }


    /**
     * @property int id
     */
    public function activate(ServerRequest $resquest)
    {   
        $userid = $resquest->getAttribute('id');
        if(!isset($userid) || empty($userid)){
            response(400, false, '', get_string('error:require_send_params'));
        }

        if(!$user = UserRepository::get($userid)){
            response(204, false, '', get_string('user_not_found'));
        }
        
        if(!UserRepository::activate($userid)){
            response(400, false, '', get_string('error:activate_user'));
        }

        response(200, true, '', get_string('success:activate_user'));
    }

}


