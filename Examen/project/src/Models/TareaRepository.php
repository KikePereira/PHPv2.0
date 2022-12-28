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

    public static function getTareasBorradas(){

        $connect=Connection::getInstance();
    
        $consulta="SELECT * FROM tareas WHERE estado_tarea='Borrada'";

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

    public static function copy($dni,$nombre,$apellido,$telefono,$correo,$direccion,$poblacion,$codigopostal,$provincia,$estado_tarea,$operario,$fecharealizacion,$anotacion_inicio,$anotacion_final){
        $connect=Connection::getInstance();
        $now=strval(date('Y-m-d'));
        $consulta="INSERT INTO `tareas`(`tarea_id`, `dni`, `nombre`, `apellido`, `telefono`, `correo`, `direccion`,`poblacion`, `codigo_postal`, `provincia`, `estado_tarea`, `fecha_creacion`, `operario_encargado`, `fecha_realizacion`, `anotacion_inicio`, `anotacion_final`) 
        VALUES(NULL,'$dni','$nombre','$apellido','$telefono','$correo','$direccion','$poblacion','$codigopostal','$provincia','$estado_tarea','$now','$operario','$fecharealizacion','$anotacion_inicio','$anotacion_final')";

        $resultado=$connect ->prepare($consulta);
            
        $resultado->execute();
    }


    public static function addUsuario($nombre,$password,$tipo){
        $connect=Connection::getInstance();
        $consulta="INSERT INTO `usuario`(`usuario_id`, `nombre`, `password`, `tipo`, `hora`) VALUES (NULL,'$nombre','$password','$tipo','')";

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

    public static function getUser($id){
        $connect=Connection::getInstance();
        
        $consulta="SELECT * FROM usuario WHERE usuario_id=$id";
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
            SET 
            estado_tarea=:estado_tarea,
            anotacion_final=:anotacion_final
            WHERE tarea_id=:tarea_id';

            $datos=[
                'estado_tarea'=>$tarea->estado_tarea,
                'anotacion_final'=>$tarea->anotacion_final,
                'tarea_id'=>$tarea->tarea_id,
            ];

            $connect->prepare($consulta)->execute($datos);
    }
    public static function updateUsuario($nombre,$password,$tipo,$id){
        
        $connect=Connection::getInstance();

            $consulta="UPDATE usuario 
            SET 
            nombre='$nombre',
            password='$password',
            tipo='$tipo'
            WHERE usuario_id='$id'";

            $connect->prepare($consulta)->execute();
    }
    
    /**
     * EliminarTarea
     *Funcion que nos elimina una tarea de la base de datos
     * @param  mixed $id
     * @return void
     */
    public static function EliminarTarea($id){
        $connect=Connection::getInstance();

        $estado='Borrada';

        $consulta="UPDATE tareas 
        SET 
        estado_tarea='$estado'
        WHERE tarea_id='$id'";

        $connect->prepare($consulta)->execute();
}

    public static function Recuperar($id){
        $connect=Connection::getInstance();

        $estado='Validacion';

        $consulta="UPDATE tareas 
        SET 
        estado_tarea='$estado'
        WHERE tarea_id='$id'";

        $connect->prepare($consulta)->execute();
    }

    public static function EliminarUsuario($id){
        $connect=Connection::getInstance();
        
        $consulta="DELETE FROM usuario WHERE usuario_id=$id";
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

    public static function TareasFiltradas($dni,$estado,$operario){
        $connect=Connection::getInstance();

        $consulta="SELECT * from tareas  WHERE dni=:dni OR estado_tarea=:estado OR operario_encargado=:operario";

        $datos=['dni'=>$dni, 'estado'=>$estado,'operario'=>$operario];

        $resultado=$connect->prepare($consulta);
        $resultado->execute($datos);
    
        $tareasFiltradas=[];

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($tareasFiltradas,$registro);
        }

        
        return $tareasFiltradas;
    }

    public static function getUsuarios(){
        $connect=Connection::getInstance();
    
        $consulta="SELECT * FROM usuario";

        $resultado=$connect->prepare($consulta);
        $resultado->execute();

        $usuario=[];

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($usuario,$registro);
        }

        
        return $usuario;
    }

}

