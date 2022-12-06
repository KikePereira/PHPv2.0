<?php

namespace App\Controllers;

use PDO;
use App\Controllers\Connection;

class TareaRepository{

    private function __construct(){

    }


    public static function getTareas(){

        $connect=Connection::getInstance();
    
        $consulta="SELECT * FROM tareas";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        $tareas=[];

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($tareas,$registro);
        }

        
        return $tareas;
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

    public static function addTarea($dni,$nombre,$apellido,$telefono,$correo,$poblacion,$direccion,$codigopostal,$provincia,$operario,$fecharealizacion,$anotacion){
        $connect=Connection::getInstance();
        $now=strval(date('Y-m-d'));
        $consulta="INSERT INTO `tareas`(`tarea_id`, `DNI`, `nombre`, `apellido`, `telefono`, `correo`, `poblacion`,`direccion`, `codigo_postal`, `provincia`, `estado_tarea`, `fecha_creacion`, `operario_encargado`, `fecha_final`, `anotacion_inicio`, `anotacion_final`) 
        VALUES(NULL,'$dni','$nombre','$apellido','$telefono','$correo','$poblacion','$direccion','$codigopostal','$provincia','B','$now','$operario','$fecharealizacion','$anotacion',NULL)";

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

