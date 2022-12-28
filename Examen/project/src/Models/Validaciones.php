<?php
namespace App\Models;

/**
 * Validaciones
 * Clase donde realizaremos todas las validaciones de los campos de Tarea
 */
class Validaciones{
    
    /**
     * validarCadena
     *Funcion que nos validara que la cadena de texto introducida solo posee letras
     * @param  mixed $cadena
     * @return bool
     */
    function validarCadena($cadena){
        $pattern = "/^[a-z]+$/i";
    
        if((preg_match($pattern, $cadena))){
    
            return true;
    
        }else{
    
            return false;
        }
    }
        
    /**
     * validarCodigo
     *Funcion que nos validara que la cadena introducido solo podra contener 5 digitos numericos
     * @param  mixed $codigo
     * @return bool
     */
    function validarCodigo($codigo){
        $pattern='/^([0-9]{5})$/';
    
        if((preg_match($pattern, $codigo))){
    
            return true;
        } else{
    
            return false;
        }
    }
        
    /**
     * validarCorreo
     *Funcion que nos validara que la cadena introducida tiene un formato de correo correcto
     * @param  mixed $correo
     * @return bool
     */
    function validarCorreo($correo){
        $pattern='/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/';
    
        if((preg_match($pattern, $correo))){
    
            return true;
        } else{
    
            return false;
        }
    }
        
    /**
     * ValidarDNI
     *Funcion que nos validara que la cadena introducida tiene un DNI valido
     * @param  mixed $dni
     * @return bool
     */
    function ValidarDNI($dni){
        $letter = substr($dni, -1);
        $numbers = substr($dni, 0, -1);
        
      if(!is_numeric($numbers)){
        return false;
      }

        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 ){
          return true;
        }
        return false;
      }
          
      /**
       * validarFechaR
       *Funcion que nos validara que la fecha de realizacion introducida no puede ser anterior a hoy
       * @param  mixed $fechaR
       * @return bool
       */
      function validarFechaR($fechaR){
    
        if ($fechaR < date('Y-m-d')) {
            return false;
        }
            return true;
    
    }
        
    /**
     * validarTelefono
     *Funcion que nos validara que la cadena introducida contiene un numero de telefono en el formato valido
     * @param  mixed $numero
     * @return bool
     */
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

