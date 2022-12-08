<?php
namespace App\Controllers;

use App\Controllers\GestorErrores;
use App\Controllers\Validaciones;

class Tarea{

    public $tarea_id;
    public $dni;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $direccion;
    public $poblacion;
    public $codigo_postal;
    public $provincia;
    public $estado_tarea;
    public $fecha_creacion;
    public $operario_encargado;
    public $fecharealizacion;
    public $anotacion_inicio;
    public $anotacion_final;

    function __construct($tarea_id,$dni,$nombre,$apellido,$telefono,$correo,$direccion,$poblacion,$codigo_postal,$provincia,$estado_tarea,$fecha_creacion,$operario_encargado,$fecharealizacion,$anotacion_inicio,$anotacion_final){
        $this->tarea_id=$tarea_id;
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->telefono=$telefono;
        $this->correo=$correo;
        $this->direccion=$direccion;
        $this->poblacion=$poblacion;
        $this->codigo_postal=$codigo_postal;
        $this->provincia=$provincia;
        $this->estado_tarea=$estado_tarea;
        $this->fecha_creacion=$fecha_creacion;
        $this->operario_encargado=$operario_encargado;
        $this->fecharealizacion=$fecharealizacion;
        $this->anotacion_inicio=$anotacion_inicio;
        $this->anotacion_final=$anotacion_final;
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
        if(empty($this->codigo_postal)){
            $error->AnotaError('codigopostal','El codigo no puede estar vacio');
        }//Error codigo no valido
        elseif(!$validaciones->validarCodigo($this->codigo_postal)){
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
        if(empty($this->operario_encargado)){
            $error->AnotaError('operario','Tiene que seleccionar un operario');
        }

        return $error;
    }
}