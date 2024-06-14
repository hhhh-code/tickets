<?php

final class User
{
    public $id;
    public $name;
    public $rol;
    public $username;
    public $password;

    public function __construct(
        $id,
        $name,
        $rol,
        $username,
        $password
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->rol = $rol;
        $this->username = $username;
        $this->password = $password;
    }
}
