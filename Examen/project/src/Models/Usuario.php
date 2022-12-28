<?php

namespace App\Models;

/**
 * Usuario
 * Clase Usuario que nos sacara y validara un usuario de la base de datos
 */
class Usuario{

    public $nombre;
    public $password;
    public $tipo;
    public $hora;
    
    /**
     * userExists
     *Funcion que nos validara si el Usuario pasado por parametros al loguearse es correcto
     * @param  mixed $nombre
     * @param  mixed $pass
     * @return bool
     */
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
    
    /**
     * setUser
     *Funcion que nos sacara de la base de datos toda la informacion del usuario pasado por parametro
     * @param  mixed $nombre
     * @return void
     */
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
    
    /**
     * updateLogin
     *Funcion que nos actualizara la hora de la ultima conexion del usuario pasado por parametro
     * @param  mixed $nombre
     * @param  mixed $hora
     * @return void
     */
    public static function updateLogin($nombre, $hora){
        $connect=Connection::getInstance();
        $consulta='UPDATE usuario SET hora = :hora WHERE nombre= :nombre';
        $datos=['nombre'=>$nombre,'hora'=>$hora];

        $connect->prepare($consulta)->execute($datos);
    }
}