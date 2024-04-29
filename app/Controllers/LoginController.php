<?php

namespace app\Controllers;

use app\Entity\Email;
use app\Repositories\UserRepository;
use Exception;


class LoginController extends Controller
{
    public function __construct() {

    }

    public function index()
    {
        phpinfo();die;
       return Controller::view('Login');
    }

    /**
     * @property string email
     * @property string password
     */
    public function authenticate(object $request)
    {
        
        if(!isset($request->email) || empty($request->email)){
            throw new Exception("Campo email vazio", 1); 
        }

        if(!isset($request->password) || empty($request->password)){
            throw new Exception("Campo password vazio", 1); 
        }
        
        $user_response = UserRepository::get_by_email(new Email($request->email));

        if(!$user_response){
            throw new Exception("Email não encontrado", 1);
        }

        $hash = password_hash($request->password, PASSWORD_DEFAULT);
        if (!password_verify($request->password, $hash)) {
            throw new Exception("Senha invalida", 1);
        }

        $this->redirect('/dashboard', 'GET');
    }

}


?>