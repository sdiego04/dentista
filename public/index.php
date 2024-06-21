<?php

use Slim\Factory\AppFactory;

require_once '../app/Core/Environment.php';
require_once '../vendor/autoload.php';

try {

    $app = AppFactory::create();
    $app->group('/api/user', function(\Slim\Routing\RouteCollectorProxy $app){
        $app->post('/all', '\app\Api\UserController:index');
        $app->post('',  '\app\Api\UserController:store');
        $app->get('/{id}',  '\app\Api\UserController:get');
        $app->get('/inative/{id}',  '\app\Api\UserController:inative');
        $app->get('/activate/{id}',  '\app\Api\UserController:activate');
    });

    $app->group('/api/legal-person', function(\Slim\Routing\RouteCollectorProxy $app){
        $app->post('', '\app\Api\LegalPersonController:save');
        $app->get('/cnpj/{doc}',  '\app\Api\LegalPersonController:getForCnpj');
        $app->get('/inative/{doc}',  '\app\Api\LegalPersonController:inative');
        $app->get('/active/{doc}',  '\app\Api\LegalPersonController:active');
        $app->get('/delete/{doc}',  '\app\Api\LegalPersonController:delete');
        $app->patch('',  '\app\Api\LegalPersonController:update');
    });

    $app->group('/api/owner', function(\Slim\Routing\RouteCollectorProxy $app){
        $app->get('/cnpj/{doc}',  '\app\Api\LegalPersonController:getForCnpj');
    });

    $app->group('/api/login', function(\Slim\Routing\RouteCollectorProxy $app){
        $app->post('', '\app\Api\LoginController:index');
    });
    

    $app->run();

} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>