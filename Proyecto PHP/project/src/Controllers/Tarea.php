<?php
namespace App\Controllers;

use App\Controllers\GestorErrores;
use App\Controllers\Validaciones;

class Tarea{

    public $nombre;
    public $apellido;
    public $dni;
    public $correo;
    public $telefono;
    public $direccion;
    public $poblacion;
    public $provincia;
    public $codigopostal;
    public $operario;
    public $fecharealizacion;
    public $anotaciones;

    function __construct($nombre,$apellido,$dni,$correo,$telefono,$direccion,$poblacion,$provincia,$codigopostal,$operario,$fecharealizacion,$anotaciones){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->dni=$dni;
        $this->correo=$correo;
        $this->telefono=$telefono;
        $this->direccion=$direccion;
        $this->poblacion=$poblacion;
        $this->provincia=$provincia;
        $this->codigopostal=$codigopostal;
        $this->operario=$operario;
        $this->fecharealizacion=$fecharealizacion;
        $this->anotaciones=$anotaciones;
    }

    function validar(){

        $error=new GestorErrores('<span style="color: red;">*','*</span>');
        $validaciones = new Validaciones;

        if(empty($this->nombre)){
            $error->AnotaError('nombre','El nombre no puede estar vacio');
        } //Error nombre no valido
        elseif(!$validaciones->validarCadena($this->nombre)){
            $error->AnotaError('nombre','El nombre no es valido');
        }
        //Error apellido vacio
        if(empty($this->apellido)){
            $error->AnotaError('apellido','El apellido no puede estar vacio');
        }//Error apellido no valido
        elseif(!$validaciones->validarCadena($this->apellido)){
            $error->AnotaError('apellido','El apellido no es valido');
        }
        //Error dni vacio
        if(empty($this->dni)){
            $error->AnotaError('dni','El CIF/DNI no puede estar vacio');
        }//Error dni no valido
        elseif(!$validaciones->ValidarDNI($this->dni)){
            $error->AnotaError('dni','El CIF/DNI no es valido');
        }   
        //Error correo vacio 
        if(empty($this->correo)){
            $error->AnotaError('correo','El correo no puede estar vacio');
        }//Error correo no valido
        elseif(!$validaciones->validarCorreo($this->correo)){
            $error->AnotaError('correo','El correo no es valido');
        }
        //Error telefono vacio
        if(empty($this->telefono)){
            $error->AnotaError('telefono','El telefono no puede estar vacio');
        }//Error telefono no valido
        elseif(!$validaciones->validarTelefono($this->telefono)){
            $error->AnotaError('telefono','El telefono no es valido');
        }
        //Error direccion vacio
        if(empty($this->direccion)){
            $error->AnotaError('direccion','La direccion no puede estar vacio');
        }
        if(empty($this->poblacion)){
            $error->AnotaError('poblacion','La poblacion no puede estar vacio');
        }//Error poblacion no valido
        elseif(!$validaciones->validarCadena($this->poblacion)){
            $error->AnotaError('poblacion','El nombre no es valido');
        }
        //Error codigo postal vacio
        if(empty($this->codigopostal)){
            $error->AnotaError('codigopostal','El codigo no puede estar vacio');
        }//Error codigo no valido
        elseif(!$validaciones->validarCodigo($this->codigopostal)){
            $error->AnotaError('codigopostal','El codigo no es valido');
        }
        //Error fecha realizacon vacio
        if(empty($this->fecharealizacion)){
            $error->AnotaError('fecharealizacion','Selecciona una fecha');
        }//Error fecha realizacion no valido
        elseif(!$validaciones->validarFechaR($this->fecharealizacion)){
            $error->AnotaError('fecharealizacion','Selecciona una fecha valida');
        }//Error provincia vacia
        if(empty($this->provincia)){
            $error->AnotaError('provincia','Selecciona una provincia');
        }//Error operario vacio
        if(empty($this->operario)){
            $error->AnotaError('operario','Tiene que seleccionar un operario');
        }

        return $error;
    }
}