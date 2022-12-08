<?php

namespace App\Controllers;

use App\Models\TareaRepository;
use App\Models\Tarea;
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

        $pagina=filter_input(INPUT_GET,'page');

        if(empty($pagina)){
            $pagina=1;
        }
        $cantTareas=10;
        $tareas=TareaRepository::getTareasPag($cantTareas,$pagina);
        $paginas=TareaRepository::paginas($cantTareas);
        return $view->render($response,'tareas.php',['tareas'=>$tareas, 'paginas'=>$paginas, 'paginaActual'=>$pagina]);
        
         
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
        $provincias=TareaRepository::getProvincias();
        $operarios=TareaRepository::getOperarios();
        return $view->render($response,'addTarea.php',['provincias'=>$provincias, 'operarios'=>$operarios]);
    }

    public function store(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
        $view=Twig::fromRequest($request);

        $tarea = new Tarea('',filter_input(INPUT_POST,'dni'),filter_input(INPUT_POST,'nombre'),filter_input(INPUT_POST,'apellido'),filter_input(INPUT_POST,'telefono'),filter_input(INPUT_POST,'correo'),filter_input(INPUT_POST,'direccion'),filter_input(INPUT_POST,'poblacion'),filter_input(INPUT_POST,'codigopostal'),filter_input(INPUT_POST,'provincia'),
        /*ESTADO TAREA*/'','',filter_input(INPUT_POST,'operario'),filter_input(INPUT_POST,'fecharealizacion'),filter_input(INPUT_POST,'anotaciones'),'');

        $error=$tarea->validar();
        if($error->HayErrores()==0){
            TareaRepository::addTarea($tarea->dni,$tarea->nombre,$tarea->apellido,$tarea->telefono,$tarea->correo,$tarea->direccion,$tarea->poblacion,$tarea->codigo_postal,$tarea->provincia,$tarea->operario_encargado,$tarea->fecharealizacion,$tarea->anotacion_inicio);
            $ultimaTarea=TareaRepository::UltimaTarea();
            return $view->render($response,'tareacompleta.php',['tarea'=>$ultimaTarea]);
        }else{
            $provincias=TareaRepository::getProvincias();
            $operarios=TareaRepository::getOperarios();
            return $view->render($response,'addTarea.php',['error'=>$error, 'tarea'=>$tarea,'provincias'=>$provincias, 'operarios'=>$operarios]);

        }


        }

        public function edit(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
            $view=Twig::fromRequest($request);

            $provincias=TareaRepository::getProvincias();
            $operarios=TareaRepository::getOperarios();

            $tareas=TareaRepository::TareaCompleta($args['id']);

            return $view->render($response,'updatetarea.php',['tarea'=>$tareas, 'provincias'=>$provincias, 'operarios'=>$operarios]);
        }

        public function update(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{

            $tarea = new Tarea(filter_input(INPUT_POST,'tarea_id'),filter_input(INPUT_POST,'dni'),filter_input(INPUT_POST,'nombre'),filter_input(INPUT_POST,'apellido'),filter_input(INPUT_POST,'telefono'),filter_input(INPUT_POST,'correo'),filter_input(INPUT_POST,'direccion'),filter_input(INPUT_POST,'poblacion'),filter_input(INPUT_POST,'codigo_postal'),filter_input(INPUT_POST,'provincia'),
            filter_input(INPUT_POST,'estado_tarea'),filter_input(INPUT_POST,'fecha_creacion'),filter_input(INPUT_POST,'operario'),filter_input(INPUT_POST,'fecha_realizacion'),filter_input(INPUT_POST,'anotacion_inicio'),filter_input(INPUT_POST,'anotacion_final'));

            TareaRepository::updateTarea($tarea);

            return self::index($request, $response, $args);
        }

    }