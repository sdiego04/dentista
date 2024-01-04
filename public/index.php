<?php

require_once '../routes/router.php';
require_once '../vendor/autoload.php';


try {

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $request = $_SERVER['REQUEST_METHOD'];
    
    if(!isset($routes[$request])){
        throw new Exception("tipo de metodo invalido", 1);
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