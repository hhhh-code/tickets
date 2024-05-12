<?php 

require_once __DIR__ . "/AuthHelper.php";

class Controller
{
    protected $AuthHelper;

    public function __construct() {
        session_start();
        $this->AuthHelper = new AuthHelper();
    }

    public function render(string $vista){
        $loadVista = __DIR__ . "/../View/" . $vista . ".php";
        require_once $loadVista;
    }

    public function redirect(string $location){
        header("Location: {$location}");
        exit(1);
    }
}

