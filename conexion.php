<?php 

class conexion
{
    
    private $password;
    private $host;
    private $db;
    private $usuario;
    private $port;


    private $conexion;
    

    public function __construct() {
        $this->password = '';
        $this->host = '127.0.0.1';
        $this->db = "ticket";
        $this->usuario = "root";
        $this->port = "3306";


        $this->conexion = new  mysqli(
            $this->host,
            $this->usuario,
            $this->password,
            $this->db,
            $this->port
        );

        if(!$this->conexion)
            die("Error de conexion" . $this->conexion->connect_error);

    }


    function Query(string $query) : mixed {
        $query = $this->conexion->query($query);
        $result = [];

        while($row = $query->fetch_object())
        {  
            $result[] = $row;
        }
        
        return $result;
    }


    function Insert(string $query) : bool {
        return $this->conexion->query($query);
    }

}

