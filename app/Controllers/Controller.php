<?php

namespace app\Controllers;

use app\Helpers\RouterHelper;
use Exception;
use League\Plates\Engine;
use League\Plates\Extension\Asset;

class Controller{
    
    public function __construct() {}

    public static function view(string $view, array $data = array()):void
    {
        $viewsPath = dirname(__FILE__, 2) . "/Views";
  
        if(!file_exists($viewsPath . DIRECTORY_SEPARATOR . $view . '.php')){
            throw new Exception("A view {$view} não existe", 1);
        }
        
        $templates = new Engine($viewsPath);
        $templates->loadExtension(new Asset('/var/www/estudoapvs/public/assets', true));
        echo $templates->render($view, array('data' => $data));
    }

    public function redirect(string $routename, string $method):void
    {
       $redirect = new RouterHelper();
       $redirect->redirect($routename, $method);
    }
}

?>