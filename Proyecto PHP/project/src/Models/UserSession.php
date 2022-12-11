<?php

namespace App\Models;

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($usuario){
        $_SESSION['usuario']=$usuario;

    }

    public static function getCurrentUser(){
        return $_SESSION['usuario'];
    }

    public static function closeSession(){
        session_unset();
        session_destroy();
    }

}

?>