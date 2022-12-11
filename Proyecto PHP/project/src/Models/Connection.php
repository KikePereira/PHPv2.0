<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Connection
 * Clase que conecta a la base de datos
 */
class Connection
{

    private static $instance;

    private function __construct(){

    }
        
    
    /**
     * getInstance
     *Funcion que retorna la conexion si esta ya ha sido instanciada o que la crea en caso contrario
     * @return self::$instance
     */
    public static function getInstance(){

        if (empty(self::$instance)) {

            $db_info = array(
                "db_host" => "localhost",
                "db_port" => "3306",
                "db_user" => "root",
                "db_pass" => "",
                "db_name" => "proyectophp",
                "db_charset" => "UTF-8"
            );

            try {
                self::$instance = new PDO("mysql:host=" . $db_info['db_host'] . ';port=' . $db_info['db_port'] . ';dbname=' . $db_info['db_name'], $db_info['db_user'], $db_info['db_pass']);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                self::$instance->query('SET NAMES utf8');
                self::$instance->query('SET CHARACTER SET utf8');
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        }

        return self::$instance;
    }
}
