<?php

namespace App\Models;

class Usuario{

    public $nombre;
    public $password;
    public $tipo;
    public $hora;

    public function userExists($nombre, $pass){

        $connect=Connection::getInstance();
    
        $consulta='SELECT * FROM usuario WHERE nombre= :nombre AND password= :pass';

        $datos=['nombre'=>$nombre, 'pass'=>$pass];

        $resultado=$connect->prepare($consulta);
        $resultado->execute($datos);

        if($resultado->rowCount()){
            return true;
        }else{
            return false;
        }

    }

    public function setUser($nombre){
        $connect=Connection::getInstance();
        $consulta='SELECT * FROM usuario WHERE nombre= :nombre';
        $datos=['nombre'=>$nombre];

        $resultado=$connect->prepare($consulta);
        $resultado->execute($datos);

        foreach($resultado as $currentUser){
            $this->nombre = $currentUser['nombre'];
            $this->password = $currentUser['password'];
            $this->tipo = $currentUser['tipo'];
            $this->hora = $currentUser['hora'];
        }
    }

    public static function updateLogin($nombre, $hora){
        $connect=Connection::getInstance();
        $consulta='UPDATE usuario SET hora = :hora WHERE nombre= :nombre';
        $datos=['nombre'=>$nombre,'hora'=>$hora];

        $connect->prepare($consulta)->execute($datos);
    }
}