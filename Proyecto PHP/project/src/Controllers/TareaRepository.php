<?php

namespace App\Controllers;

use PDO;
use App\Controllers\Connection;
use Exception;
use PDOException;

class TareaRepository{

    private function __construct(){

    }


    public static function getTareas(){

        $connect=Connection::getInstance();
    
        $consulta="SELECT * FROM tareas ORDER BY(tarea_id) DESC";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        $tareas=[];

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($tareas,$registro);
        }

        
        return $tareas;
    }
    public static function getProvincias(){
        $connect=Connection::getInstance();
    
        $consulta="SELECT * FROM tbl_provincias";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        $provincias=[];

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($provincias,$registro);
        }

        
        return $provincias;
    }

    public static function getOperarios(){
        $connect=Connection::getInstance();
    
        $consulta="SELECT * FROM operarios";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        $operarios=[];

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($operarios,$registro);
        }

        
        return $operarios;
    }
    

    public static function getTareasPendientes(){

        $connect=Connection::getInstance();
    
        $consulta="SELECT * FROM tareas WHERE estado_tarea='P'";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        $tareas=[];

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($tareas,$registro);
        }

        
        return $tareas;
    }

    public static function addTarea($dni,$nombre,$apellido,$telefono,$correo,$direccion,$poblacion,$codigopostal,$provincia,$operario,$fecharealizacion,$anotacion){
        $connect=Connection::getInstance();
        $now=strval(date('Y-m-d'));
        $consulta="INSERT INTO `tareas`(`tarea_id`, `dni`, `nombre`, `apellido`, `telefono`, `correo`, `direccion`,`poblacion`, `codigo_postal`, `provincia`, `estado_tarea`, `fecha_creacion`, `operario_encargado`, `fecha_realizacion`, `anotacion_inicio`, `anotacion_final`) 
        VALUES(NULL,'$dni','$nombre','$apellido','$telefono','$correo','$direccion','$poblacion','$codigopostal','$provincia','B','$now','$operario','$fecharealizacion','$anotacion',NULL)";

        $resultado=$connect ->prepare($consulta);
            
        $resultado->execute();
    }

    public static function TareaCompleta($id){
        $connect=Connection::getInstance();
        
        $consulta="SELECT * FROM tareas WHERE tarea_id=$id";
        $resultado=$connect->prepare($consulta);
        $resultado->execute();


        return $resultado->fetch(PDO::FETCH_ASSOC);
       
    }

    public static function updateTarea($tarea){
        
        $connect=Connection::getInstance();

            $consulta='UPDATE tareas 
            SET dni=:dni,
            nombre=:nombre,
            apellido=:apellido,
            telefono=:telefono,
            correo=:correo,
            direccion=:direccion,
            poblacion=:poblacion,
            codigo_postal=:codigo_postal,
            provincia=:provincia,
            estado_tarea=:estado_tarea,
            fecha_creacion=:fecha_creacion,
            operario_encargado=:operario_encargado,
            fecha_realizacion=:fecha_realizacion,
            anotacion_inicio=:anotacion_inicio,
            anotacion_final=:anotacion_final
            WHERE tarea_id=:tarea_id';

            $datos=[
                'dni'=>$tarea->dni,
                'nombre'=>$tarea->nombre,
                'apellido'=>$tarea->apellido,
                'telefono'=>$tarea->telefono,
                'correo'=>$tarea->correo,
                'direccion'=>$tarea->direccion,
                'poblacion'=>$tarea->poblacion,
                'codigo_postal'=>$tarea->codigo_postal,
                'provincia'=>$tarea->provincia,
                'estado_tarea'=>$tarea->estado_tarea,
                'fecha_creacion'=>$tarea->fecha_creacion,
                'operario_encargado'=>$tarea->operario_encargado,
                'fecha_realizacion'=>$tarea->fecharealizacion,
                'anotacion_inicio'=>$tarea->anotacion_inicio,
                'anotacion_final'=>$tarea->anotacion_final,
                'tarea_id'=>$tarea->tarea_id,

            ];

            $connect->prepare($consulta)->execute($datos);
    }

    public static function EliminarTarea($id){
        $connect=Connection::getInstance();
        
        $consulta="DELETE FROM tareas WHERE tarea_id=$id";
        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public static function Paginacion(){
        
        $connect=Connection::getInstance();
    
        $consulta="SELECT * FROM tareas";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        $num_filas=$resultado->rowCount();

        $tareas=[];

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($tareas,$registro);
        }

        
        return $tareas;
    }

    public static function UltimaTarea(){

        $connect=Connection::getInstance();

        $consulta="SELECT * from tareas ORDER BY tarea_id DESC LIMIT 1";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_ASSOC);

    }

}

