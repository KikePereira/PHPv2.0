<?php

namespace App\Models;

class Usuario{

    public $nombre;
    public $password;
    public $tipo;

    function __construct($nombre,$password,$tipo){
        $this->nombre=$nombre;
        $this->password=$password;
        $this->tipo=$tipo;
    }
}