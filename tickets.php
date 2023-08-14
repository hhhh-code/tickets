<?php 

require_once "conexion.php";

final class Tickets 
{
    private $conexion;

    public function __construct() {
        $this->conexion = new conexion();
    }   
    
    function registrarTicket(object $ticket) : bool {
        $query = "INSERT INTO ticket (descripcion) VALUES ('{$ticket->descripcion}')"; 
        return $this->conexion->Insert($query);
    }


    function getTickets() : mixed {
        $query = "SELECT * FROM ticket"; 
        return $this->conexion->Query($query);
    }

    function DeleteTicket(int $id) : bool {
        return $this->conexion->Delete($id);
    }

}

