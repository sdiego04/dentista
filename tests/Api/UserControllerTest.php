<?php

namespace app\Api;

use app\Helpers\UserHelper;
use app\Repositories\UserRepository;
use PHPUnit\Framework\TestCase;
use app\Entity\User;
use stdClass;

class UserControllerTest extends TestCase {

    private UserHelper $user_helper;

    public function oktestIndex()
    {   
        $options = new stdClass();
        if(!isset($options->paginate)){
            $options->paginate = 1;
        }
   
       $this->user_helper = new UserHelper();    
       $list = UserRepository::all($options)->paginate($options->paginate);
       $userlist = $this->user_helper->buildDataBatchObject($list);
       $this->assertNotEmpty($userlist);
       
    }

    public function oktestGet()
    {   
        $params = new stdClass();
        $params->id = 1;
        if(!isset($params->id) || empty($params->id)){
            response(400, false, '', 'Nenhum parametro informado!');
        }

        if(!is_numeric($params->id)){
            response(400, false, '', 'Formato invalido!');
        }

        if(!$user = UserRepository::get($params->id)){
            response(204, false, '', get_string('user_not_found'));
        }

        $this->user_helper = new UserHelper();    
        $build_user = $this->user_helper->buildDataObject($user);
    }
    
    public function testStore()
    {
        $params = new stdClass();
        $params->email = 's.diego04@gmail.com';
        $params->cpf = '02019969017';
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
}

?>    