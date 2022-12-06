<?php

namespace App\Controllers;

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
}