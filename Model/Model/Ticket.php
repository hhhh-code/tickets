<?php

final class Ticket
{
    public $id;
    public $descripcion;
    public $id_usuario;

    public function __invoke()
    {
        
    }

    public function __construct(
        $id,
        $descripcion,
        $id_usuario,
    ) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->id_usuario = $id_usuario;
    }
}
