<?php 

require_once __DIR__ . "/../../Repository/TicketsRepository.php";


final class Editar 
{
    protected $ticket;

    public function __construct(){
        $this->ticket = new TicketsRepository();
    }

    public function handle($info): void {
        $this->ticket->Update($info["id"], $info["descripcion"]);
    }
}