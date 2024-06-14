<?php 

require_once __DIR__ . "/../../Repository/TicketsRepository.php";

final class EliminarTicket 
{
    protected $ticket;

    public function __construct(){
        $this->ticket = new TicketsRepository();
    }

    public function handle($info): void {
        $this->ticket->DeleteTicket($info["id"]);
    }

}
