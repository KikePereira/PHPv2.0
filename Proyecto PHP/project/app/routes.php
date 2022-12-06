<?php

declare(strict_types=1);

use App\Controllers\TareaController1;
use App\Controllers\AddTareaController;
use App\Controllers\TareaController;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\Twig;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $view=Twig::fromRequest($request);
        return $view->render($response,'index.php');
    });

    $app->group('/tareas',function(Group $group){
        $group->get('', TareaController::class .':index');
        $group->get('/pendientes', TareaController::class .':pendientes');
        $group->get('/create', TareaController::class . ':create');
        $group->get('/{id}', TareaController::class . ':show');
        $group->get('/{id}/delete', TareaController::class . ':delete');
        $group->delete('/{id}', TareaController::class . ':destroy');
        $group->post('/create', TareaController::class . ':store');
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
