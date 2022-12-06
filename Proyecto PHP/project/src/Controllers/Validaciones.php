<?php
namespace App\Controllers;

class Validaciones{

    function validarCadena($cadena){
        $pattern = "/^[a-z]+$/i";
    
        if((preg_match($pattern, $cadena))){
    
            return true;
    
        }else{
    
            return false;
        }
    }
    
    function validarCodigo($codigo){
        $pattern='/^([0-9]{5})$/';
    
        if((preg_match($pattern, $codigo))){
    
            return true;
        } else{
    
            return false;
        }
    }
    
    function validarCorreo($correo){
        $pattern='/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/';
    
        if((preg_match($pattern, $correo))){
    
            return true;
        } else{
    
            return false;
        }
    }
    
    function ValidarDNI($dni){
        $letter = substr($dni, -1);
        $numbers = substr($dni, 0, -1);
      
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 ){
          return true;
        }
        return false;
      }
    
      function validarFechaR($fechaR){
    
        if ($fechaR < date('Y-m-d')) {
            return false;
        }
            return true;
    
    }
    
    function validarTelefono($numero){
    
        $telefonoEspacios = '/^([0-9]{3})( )([0-9]{3})( )([0-9]{3})$/';
        $telefonoGuiones = '/^([0-9]{3})(-)([0-9]{3})(-)([0-9]{3})$/';
        
        if((preg_match($telefonoEspacios, $numero)) || (preg_match($telefonoGuiones, $numero))){
        
            return true;
        } else{
        
            return false;
        }
        }

}

