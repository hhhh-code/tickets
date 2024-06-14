<?php
require_once "conexion.php";
require_once __DIR__ . "/../Model/User.php";

final class UsuarioRepository
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new conexion(User::class);
    }

    function getUsersByRol(int $rol): mixed
    {
        $query = "SELECT * FROM user WHERE rol = {$rol}";
        return $this->conexion->Query($query);
    }

    function getUserByCredentials(string $username, string $password): mixed
    {
        $query = "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'";
        $result = $this->conexion->Query($query);
        return (object) $result[0];
    }
}
