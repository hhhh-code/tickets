<?php 

require_once "tickets.php";

final class EliminarTicket 
{
    protected $ticket;

    public function __construct(){
        $this->ticket = new Tickets();
    }


    public function handle($info): void {
        $this->ticket->DeleteTicket($info["id"]);
        header("LOCATION: /Tuturial1");
    }

}

$action = new EliminarTicket();
$action->handle($_REQUEST);
