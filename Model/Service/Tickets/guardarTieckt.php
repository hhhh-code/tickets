<?php

require_once __DIR__ . "/../../Model/Ticket.php";
require_once __DIR__ . "/../../Repository/TicketsRepository.php";

final class guardarTieckt
{
    private $ticket;

    public function __construct()
    {
        $this->ticket = new TicketsRepository();
    }

    function handle($info): void
    {
        $ticket = new Ticket(NULL, $info["descripcion"], $info["encargado"]);

        if (strlen($ticket->descripcion) <= 0) {
            header("LOCATION: /Ticket/index");
            return;
        }
        
        $this->ticket->registrarTicket($ticket);
    }
}
