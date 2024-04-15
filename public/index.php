<?php

require_once '../app/Core/Environment.php';
require_once '../routes/router.php';
require_once '../vendor/autoload.php';

try {

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $request = $_SERVER['REQUEST_METHOD'];
    
    if(!isset($routes[$request])){
        throw new Exception("tipo de metodo invalido", 1);
    }

    if($request == 'GET' && is_numeric($number_param = filter_var($uri, FILTER_SANITIZE_NUMBER_INT))){
       $uri = str_replace($number_param, "", $uri);
    }

    if(!array_key_exists($uri, $routes[$request])){
        throw new Exception("Rota invalida", 1);  
    }
    
    $controller = $routes[$request][$uri];
    $controller();

} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>