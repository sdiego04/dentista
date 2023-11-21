<?php

namespace app\Helpers;
require_once __DIR__ . '/../../routes/router.php';

use Exception;

class RouterHelper {

    private $routes = array();

    public function __construct() {
        $this->routes = getRouters();
    }

    public function redirect(string $routename, string $method):void
    {
        $server_name = $_SERVER['SERVER_NAME'];

        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https://" : "http://";
    
        $url = $protocol . $server_name . $routename;
       
        if(!isset($this->routes[$method])){
            throw new Exception("tipo de metodo invalido", 1);
        }
        
        if(!array_key_exists($routename, $this->routes[$method])){
            throw new Exception("Rota invalida", 1);  
        }

        header('Location:' . $url, true);
        
        exit;
    }


}


?>