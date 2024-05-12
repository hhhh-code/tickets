<?php 

require_once "conexion.php";
require_once __DIR__ . "/../Model/Ticket.php";


final class TicketsRepository
{
    private $conexion;

    public function __construct() {
        $this->conexion = new conexion(Ticket::class);
    }   
    
    function registrarTicket(object $ticket) : bool {
        return $this->conexion->Insert($ticket);
    }


    function getTickets() : mixed {
        $query = "SELECT *,TICKET.id  FROM ticket AS TICKET INNER JOIN user AS USER ON USER.id = TICKET.id_usuario"; 
        return $this->conexion->Query($query);
    }

    function DeleteTicket(int $id) : bool {
        return $this->conexion->Delete($id);
    }

    function Update($id, $descripcion){
        $query = "UPDATE ticket SET descripcion = '{$descripcion}' WHERE id = {$id}";
        return $this->conexion->Update($query);
    }

}

