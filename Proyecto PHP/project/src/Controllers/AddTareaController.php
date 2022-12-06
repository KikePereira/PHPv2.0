<?php

namespace App\Controllers;

use App\Controllers\TareaRepository;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class AddTareaController implements RequestHandlerInterface{

    function __construct(){
        
    }

    public function handle(ServerRequestInterface $request): ResponseInterface{

        $view=Twig::fromRequest($request);

        $tareas=TareaRepository::getTareas();

        $response=new Response();
        return $view->render($response,'addTarea.php');
        
         
    }


}