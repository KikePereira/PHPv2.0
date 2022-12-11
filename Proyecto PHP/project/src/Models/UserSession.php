<?php

namespace App\Models;

/**
 * UserSession
 * Clase de Sesiones de Usuario
 */
class UserSession{

    public function __construct(){
        session_start();
    }
    
    /**
     * setCurrentUser
     *Funcion que nos establece una sesion activa con el usuario pasado por parametros
     * @param  mixed $usuario
     * @return void
     */
    public function setCurrentUser($usuario){
        $_SESSION['usuario']=$usuario;
    }
    
    /**
     * getCurrentUser
     *Funcion que nos devuelve la sesion activa
     * @return $_SESSION['usuario'];
     */
    public static function getCurrentUser(){
        return $_SESSION['usuario'];
    }
    
    /**
     * closeSession
     *Funcion que nos elimina todas las sesiones
     * @return void
     */
    public static function closeSession(){
        session_unset();
        session_destroy();
    }

}

?>