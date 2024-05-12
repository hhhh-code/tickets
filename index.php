<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
error_reporting(1);

require_once "Libs/Controller.php";



final class App
{
    public $error;

    public function __construct()
    {
        $url = explode("/", rtrim($_GET['url']));

        if(empty($url[0])){
            $archivoController = 'Controller/MainController.php';
            require_once $archivoController;

            $controller = new MainController();
            $controller->index();
            return;
        }

        $controllerName = ucfirst("{$url[0]}Controller");
        $controllerPhat = "Controller/{$controllerName}.php";

        if(!file_exists($controllerPhat)){
            return;
        }

        require_once $controllerPhat;
        $controller = new $controllerName;

        if(isset($url[1])){
            $controller->{$url[1]}();
        }
    }
}


new App();
