<?php


require_once __DIR__ . '/../../routes/router.php';


function redirect(string $routename, string $method):void
{
    $routes = getRouters();
    $server_name = $_SERVER['SERVER_NAME'];

    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https://" : "http://";

    $url = $protocol . $server_name . $routename;
   
    if(!isset($routes[$method])){
        throw new Exception("tipo de metodo invalido", 1);
    }
    
    if(!array_key_exists($routename, $routes[$method])){
        throw new Exception("Rota invalida", 1);  
    }

    header('Location:' . $url, true);
    
    exit;
}


?>