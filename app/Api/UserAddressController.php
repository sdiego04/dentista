<?php


namespace app\Api;

use app\Repositories\UserAddressRepository;

use stdClass;

class UserAddressController {

    public function index()
    {  
        if(!$list = UserAddressRepository::all()){
            response(204, false, "", 'Nenhum usuario encontrado!');
        }
        
        response(200, true, $list, 'Consulta realizada com sucesso!');
    }

    public function get(stdClass $params)
    {   

    }

    public function store(stdClass $params)
    {

    }

    public function update(stdClass $params)
    {  

    }

    public function inative(int $user_id)
    {
  
    }

}


