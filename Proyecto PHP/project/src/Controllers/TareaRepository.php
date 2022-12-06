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

    public static function addTarea($dni,$nombre,$apellido,$telefono,$correo,$poblacion,$codigop,$provincia,$operario,$fechaR,$anotacion){
        $connect=Connection::getInstance();
        $now=strval(date('Y-m-d'));
        $consulta="INSERT INTO `tareas`(`tarea_id`, `DNI`, `nombre`, `apellido`, `telefono`, `correo`, `poblacion`, `codigo_postal`, `provincia`, `estado_tarea`, `fecha_creacion`, `operario_encargado`, `fecha_final`, `anotacion_inicio`, `anotacion_final`) 
        VALUES(NULL,'$dni','$nombre','$apellido','$telefono','$correo','$poblacion','$codigop','$provincia','B','$now','$operario','$fechaR','$anotacion',NULL)";

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

}

