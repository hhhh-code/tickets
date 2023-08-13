<?php 

require_once "tickets.php";

final class guardarTieckt
{

    private $ticket;

    public function __construct() {
        $this->ticket = new Tickets();    
    }

    function handle($info) : void {
        
        $ticket = (object) [
            "descripcion" => $info["descripcion"]
        ];

        if(strlen($ticket->descripcion) <= 0){
            header("LOCATION: /Tuturial1");
            return;
        }
        
        
        $this->ticket->registrarTicket($ticket);

        header("LOCATION: /Tuturial1");
    }
}



$action = new guardarTieckt();


$action->handle($_REQUEST);
