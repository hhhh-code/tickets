<?php

class conexion
{

    private $password;
    private $host;
    private $db;
    private $usuario;
    private $port;
    private $tableName;


    private $conexion;


    public function __construct(string $class)
    {
        $this->password = '';
        $this->host = '127.0.0.1';
        $this->db = "ticket";
        $this->usuario = "root";
        $this->port = "3306";
        $this->tableName = $class;


        $this->conexion = new  mysqli(
            $this->host,
            $this->usuario,
            $this->password,
            $this->db,
            $this->port
        );

        if (!$this->conexion)
            die("Error de conexion" . $this->conexion->connect_error);
    }


    function Query(string $query): mixed
    {
        $query = $this->conexion->query($query);
        $result = [];

        while ($row = $query->fetch_object()) {
            $result[] = $row;
        }

        return $result;
    }


    function Insert(object $entity): bool
    {

        $attr = get_object_vars($entity);
        $columnName = "(" . join(",", array_keys($attr))  . ")";

        $query = "INSERT INTO {$this->tableName} {$columnName} VALUES (" . substr(str_repeat('?,',count($attr)),0,-1) . ")";
        $stm = $this->conexion->prepare($query);

        return $stm->execute(array_values($attr));
    }

    function Delete(int $id): bool
    {
        $query = "DELETE FROM ticket WHERE id = ?";
        $stm = $this->conexion->prepare($query);
        return $stm->execute(array($id));
    }

    function Update(string $query): bool
    {
        return $this->conexion->query($query);
    }
}
