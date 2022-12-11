<?php

namespace App\Models;

use PDO;
use App\Models\Connection;
use Exception;
use PDOException;

/**
 * TareaRepository
 * Clase Reposotiro de las tareas que nos saca las consultas con la base de datos
 */
class TareaRepository{

    private function __construct(){

    }

    
    /**
     * getTareas
     *Funcion que nos retorna todas las tareas de la base de datos y nos las ornde a por orden descendiente 
     * @return $tareas
     */
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
    
    /**
     * getProvincias
     *Funcion que nos retorna todas las provincias de la base de datos
     * @return $provincias
     */
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
    
    /**
     * getOperarios
     *Funcion que nos retorna todos los operarios de la base de datos
     * @return $operarios
     */
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
    
    
    /**
     * getTareasPendientes
     *Funcion que nos retorna todas las tareas en estado "pendiente" de la base de datos
     * @return tareasPendientes
     */
    public static function getTareasPendientes(){

        $connect=Connection::getInstance();
    
        $consulta="SELECT * FROM tareas WHERE estado_tarea='Pendiente'";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        $tareasPendientes=[];

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($tareasPendientes,$registro);
        }

        
        return $tareasPendientes;
    }
    
    /**
     * addTarea
     *Funcion que nos agrega una tarea a la base de datos con sus respectivos datos
     * @param  mixed $dni
     * @param  mixed $nombre
     * @param  mixed $apellido
     * @param  mixed $telefono
     * @param  mixed $correo
     * @param  mixed $direccion
     * @param  mixed $poblacion
     * @param  mixed $codigopostal
     * @param  mixed $provincia
     * @param  mixed $operario
     * @param  mixed $fecharealizacion
     * @param  mixed $anotacion
     * @return void
     */
    public static function addTarea($dni,$nombre,$apellido,$telefono,$correo,$direccion,$poblacion,$codigopostal,$provincia,$operario,$fecharealizacion,$anotacion){
        $connect=Connection::getInstance();
        $now=strval(date('Y-m-d'));
        $consulta="INSERT INTO `tareas`(`tarea_id`, `dni`, `nombre`, `apellido`, `telefono`, `correo`, `direccion`,`poblacion`, `codigo_postal`, `provincia`, `estado_tarea`, `fecha_creacion`, `operario_encargado`, `fecha_realizacion`, `anotacion_inicio`, `anotacion_final`) 
        VALUES(NULL,'$dni','$nombre','$apellido','$telefono','$correo','$direccion','$poblacion','$codigopostal','$provincia','Validacion','$now','$operario','$fecharealizacion','$anotacion',NULL)";

        $resultado=$connect ->prepare($consulta);
            
        $resultado->execute();
    }
    
    /**
     * TareaCompleta
     *Funcion que nos retorna todos los datos de la tarea con la id que le pasamos como parametro
     * @param  mixed $id
     * @return void
     */
    public static function TareaCompleta($id){
        $connect=Connection::getInstance();
        
        $consulta="SELECT * FROM tareas WHERE tarea_id=$id";
        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_ASSOC);
       
    }
    
    /**
     * updateTarea
     *Funcion que nos actualiza los parametros que le pasamos por parametro a la tarea cuya id le pasamos tambien por parametro
     * @param  mixed $tarea
     * @return void
     */
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
    
    /**
     * EliminarTarea
     *Funcion que nos elimina una tarea de la base de datos
     * @param  mixed $id
     * @return void
     */
    public static function EliminarTarea($id){
        $connect=Connection::getInstance();
        
        $consulta="DELETE FROM tareas WHERE tarea_id=$id";
        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    
    /**
     * paginas
     *Funcion que nos calcula el total de paginas de la lista de tareas segun cuantas queremos representar
     * @param  mixed $numTareas
     * @return $resultado
     */
    public static function paginas($numTareas){
        $connect=Connection::getInstance();

        $consulta="SELECT COUNT(*) AS resultado FROM tareas";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();
         
        return ceil($resultado->fetch(PDO::FETCH_ASSOC)['resultado']/$numTareas);
    }
    
    /**
     * getTareasPag
     *Funcion que nos devuelve las Tareas paginadas segun el numero de tareas que queremos ver en la lista
     * @param  mixed $numTareas
     * @param  mixed $pagina
     * @return $tareas
     */
    public static function getTareasPag($numTareas, $pagina){
        
        $connect=Connection::getInstance();

        $offset = ($pagina - 1) * ($numTareas + 1);

        $consulta="SELECT * FROM tareas ORDER BY(tarea_id) DESC LIMIT $numTareas OFFSET $offset ";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();
        
        $tareas=[];

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($tareas,$registro);
        }

        
        return $tareas;
    }
    
    /**
     * UltimaTarea
     *Funcion que nos devuelve la ultima tarea agregada a la base de datos, la tarea con el ID mas alto
     * @return $resultado
     */
    public static function UltimaTarea(){

        $connect=Connection::getInstance();

        $consulta="SELECT * from tareas ORDER BY tarea_id DESC LIMIT 1";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_ASSOC);

    }

}

