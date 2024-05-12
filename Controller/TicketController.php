<?php

require_once __DIR__ . "/../Model/Service/Tickets/guardarTieckt.php";
require_once __DIR__ . "/../Model/Service/Tickets/Editar.php";
require_once __DIR__ . "/../Model/Service/Tickets/EliminarTicket.php";


final class TicketController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render("Tickets/index");
    }

    public function guardarTicket()
    {
        try {
            $guardar = new guardarTieckt();
            $guardar->handle($_REQUEST);
            $this->redirect("/Ticket/index");
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function editarTicket()
    {
        try {
            $editar = new Editar();
            $editar->handle($_REQUEST);
            $this->redirect("/Ticket/index");
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function eliminarTicket()
    {
        try {
            $eliminar = new EliminarTicket();
            $eliminar->handle($_REQUEST);
            $this->redirect("/Ticket/index");
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

}
