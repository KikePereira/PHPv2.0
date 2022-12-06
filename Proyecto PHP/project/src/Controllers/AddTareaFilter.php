<?php

use App\Controllers\GestorErrores;
use App\Controllers\TareaRepository;
use App\Controllers\Validaciones;

$error=new GestorErrores('<span style="color: red;">*','*</span>');
$validaciones = new Validaciones;

if($_POST){
    //Error nombre vaciodv
    if(filter_input(INPUT_POST,'nombre')==''){
        $error->AnotaError('nombre','El nombre no puede estar vacio');
    } //Error nombre no valido
    elseif(!$validaciones->validarCadena(filter_input(INPUT_POST,'nombre'))){
        $error->AnotaError('nombre','El nombre no es valido');
    }
    //Error apellido vacio
    if(filter_input(INPUT_POST,'apellido')==''){
        $error->AnotaError('apellido','El apellido no puede estar vacio');
    }//Error apellido no valido
    elseif(!$validaciones->validarCadena(filter_input(INPUT_POST,'apellido'))){
        $error->AnotaError('apellido','El apellido no es valido');
    }
    //Error dni vacio
    if(filter_input(INPUT_POST,'dni')==''){
        $error->AnotaError('dni','El CIF/DNI no puede estar vacio');
    }//Error dni no valido
    elseif(!$validaciones->ValidarDNI(filter_input(INPUT_POST,'dni'))){
        $error->AnotaError('dni','El CIF/DNI no es valido');
    }   
    //Error correo vacio 
    if(filter_input(INPUT_POST,'correo')==''){
        $error->AnotaError('correo','El correo no puede estar vacio');
    }//Error correo no valido
    elseif(!$validaciones->validarCorreo(filter_input(INPUT_POST,'correo'))){
        $error->AnotaError('correo','El correo no es valido');
    }
    //Error telefono vacio
    if(filter_input(INPUT_POST,'telefono')==''){
        $error->AnotaError('telefono','El telefono no puede estar vacio');
    }//Error telefono no valido
    elseif(!$validaciones->validarTelefono(filter_input(INPUT_POST,'telefono'))){
        $error->AnotaError('telefono','El telefono no es valido');
    }
    //Error direccion vacio
    if(filter_input(INPUT_POST,'direccion')==''){
        $error->AnotaError('direccion','La direccion no puede estar vacio');
    }
    if(filter_input(INPUT_POST,'poblacion')==''){
        $error->AnotaError('poblacion','La poblacion no puede estar vacio');
    }//Error poblacion no valido
    elseif(!$validaciones->validarCadena(filter_input(INPUT_POST,'poblacion'))){
        $error->AnotaError('poblacion','El nombre no es valido');
    }
    //Error codigo postal vacio
    if(filter_input(INPUT_POST,'codigo')==''){
        $error->AnotaError('codigo','El codigo no puede estar vacio');
    }//Error codigo no valido
    elseif(!$validaciones->validarCodigo(filter_input(INPUT_POST,'codigo'))){
        $error->AnotaError('codigo','El codigo no es valido');
    }
    //Error fecha realizacon vacio
    if(empty($_POST["fechaR"])){
        $error->AnotaError('fechaR','Selecciona una fecha');
    }//Error fecha realizacion no valido
    elseif(!$validaciones->validarFechaR(filter_input(INPUT_POST,'fechaR'))){
        $error->AnotaError('fechaR','Selecciona una fecha valida');
    }//Error provincia vacia
    if(empty($_POST["provincia"])){
        $error->AnotaError('provincia','Selecciona una provincia');
    }//Error operario vacio
    if(empty($_POST["operarios"])){
        $error->AnotaError('operarios','Tiene que seleccionar un operario');
    }
    //Si no hay errores imprimir resultado
    if(!$error->HayErrores()){
        $dni=$_POST["dni"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $poblacion=$_POST["poblacion"];
        $codigo=$_POST["codigo"];
        $provincia=$_POST["provincia"];
        $anotacion=$_POST["anotacion"];
        $fechaR=strval($_POST["fechaR"]);
        $operario=$_POST["operarios"];
        
        $tarea= new TareaRepository;
        $tarea->addTarea($dni,$nombre,$apellido,$telefono,$correo,$poblacion,$codigo,$provincia,$operario,$fechaR,$anotacion);

    }else{
    //Si hay errores imprimir la vista, que saldra con los correspondientes errores
        include('../../templates/addTarea.php');
    }

}else{
    //Si es la primera vez que se inicia saltara la vista (Si ningun error)
    include('../../templates/addTarea.php');
}
