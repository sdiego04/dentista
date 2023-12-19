<?php

$routes = [
    'POST' => [
       '/login' => fn() => load('LoginController', 'authenticate'),
       '/client-add' => fn () => load('ClientController', 'store'),
       '/client-update' => fn () => load('ClientController', 'update'),
       '/type-contact-add' => fn () => load('TypeContactController', 'store'),
    ],
    'GET' => [
        '/login' => fn() => load('LoginController', 'index'),
        '/dashboard' => fn () => load('DashboardController', 'index'),
        '/' => fn () => load('DashboardController', 'index'),
        '/client-add' => fn () => load('ClientController', 'form_add'),
        '/client-list' => fn () => load('ClientController', 'list'),
        '/client-delete/' => fn () => load('ClientController', 'delete'),
        '/client-actived/' => fn () => load('ClientController', 'actived'),
        '/client-update/' => fn () => load('ClientController', 'form_update'),
        '/type-contact-list' => fn () => load('TypeContactController', 'list'),
        '/type-contact-update/' => fn () => load('TypeContactController', 'form_update'),
        '/type-contact-add' => fn () => load('TypeContactController', 'form_add'),
        '/type-contact-actived/' => fn () => load('TypeContactController', 'actived'),
        '/type-contact-delete/' => fn () => load('TypeContactController', 'delete'),
        '/api/user/'  => fn () => loadApi('UserController', 'get'),
    ]
];

function load(string $controller, string $action){

    try {

        $controllerNamespace = "app\\Controllers\\" . $controller ;

        if (!class_exists($controllerNamespace)) {
            throw new Exception("o controller não exite :" . $controller .'\n', 1);
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("Metodo " . $action . "não existe! \n", 1);
        }

        $controllerInstance->$action((object) $_REQUEST);

    } catch (\Throwable $th) {
        echo $th->getMessage();
    }

}


function loadApi(string $controller, string $action){

    try {

        $controllerNamespace = "app\\Api\\" . $controller ;
      
        if (!class_exists($controllerNamespace)) {
            throw new Exception("o controller não exite :" . $controller .'\n', 1);
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("Metodo " . $action . "não existe! \n", 1);
        }

        $controllerInstance->$action((object) $_REQUEST);

    } catch (\Throwable $th) {
        echo $th->getMessage();
    }

}


function getRouters():array
{
    global $routes;
   
    return $routes;
}


?>