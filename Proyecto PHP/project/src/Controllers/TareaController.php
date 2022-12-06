<?php

namespace App\Controllers;

use App\Controllers\Tarea;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class TareaController {
    private $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{

        $view=Twig::fromRequest($request);

        $tareas=TareaRepository::getTareas();

        return $view->render($response,'tareas.php',['tareas'=>$tareas]);
        
         
    }

    public function pendientes(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{

        $view=Twig::fromRequest($request);

        $tareas=TareaRepository::getTareasPendientes();

        return $view->render($response,'tareaspendientes.php',['tareas'=>$tareas]);

    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        
      
        
        $view=Twig::fromRequest($request);
        $tareas=TareaRepository::TareaCompleta($args['id']);

        return $view->render($response,'tareacompleta.php',['tarea'=>$tareas]);

    }

    public function delete(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        $view=Twig::fromRequest($request);

        $tareas=TareaRepository::TareaCompleta($args['id']);
        return $view->render($response,'deletetarea.php',['tarea'=>$tareas]);

    }

    public function destroy(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        $view=Twig::fromRequest($request);

        TareaRepository::EliminarTarea($args['id']);
        $tareas=TareaRepository::getTareas();

        return $view->render($response,'tareas.php',['tareas'=>$tareas]);
    }

    public function create(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        $view=Twig::fromRequest($request);

        return $view->render($response,'addTarea.php');
    }
    public function store(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        $view=Twig::fromRequest($request);

        $tarea = new Tarea(filter_input(INPUT_POST,'nombre'),filter_input(INPUT_POST,'apellido'),filter_input(INPUT_POST,'dni'),filter_input(INPUT_POST,'correo'),filter_input(INPUT_POST,'telefono'),filter_input(INPUT_POST,'direccion'),filter_input(INPUT_POST,'poblacion'),filter_input(INPUT_POST,'provincia'),filter_input(INPUT_POST,'codigopostal'),filter_input(INPUT_POST,'operario'),filter_input(INPUT_POST,'fecharealizacion'),filter_input(INPUT_POST,'anotaciones'));


        $error=$tarea->validar();
        if($error->HayErrores()==0){
            TareaRepository::addTarea($tarea->dni,$tarea->nombre,$tarea->apellido,$tarea->telefono,$tarea->correo,$tarea->poblacion,$tarea->direccion,$tarea->codigopostal,$tarea->provincia,$tarea->operario,$tarea->fecharealizacion,$tarea->anotaciones);
            $ultimaTarea=TareaRepository::UltimaTarea();
            return $view->render($response,'tareacompleta.php',['tarea'=>$ultimaTarea]);
        }else{
            return $view->render($response,'addTarea.php',['error'=>$error, 'tarea'=>$tarea]);

        }


        }

    }