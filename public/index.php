<?php

use Slim\Factory\AppFactory;

require_once '../app/Core/Environment.php';
require_once '../routes/router.php';
require_once '../vendor/autoload.php';

try {

    $app = AppFactory::create();
    $app->group('/api/user', function(\Slim\Routing\RouteCollectorProxy $app){
        $app->post('', '\app\Api\UserController:index');
        //...
    });
    $app->run();

} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>