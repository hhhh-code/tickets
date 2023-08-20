<?php 

require_once "tickets.php";


final class Editar 
{
    protected $ticket;

    public function __construct(){
        $this->ticket = new Tickets();
    }

    public function handle($info): void {
        $this->ticket->Update($info["id"], $info["descripcion"]);
        header("LOCATION: /Tuturial1");
    }

}


$action = new Editar();
$action->handle($_REQUEST);

