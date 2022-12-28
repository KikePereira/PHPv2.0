<?php

declare(strict_types=1);

use App\Controllers\LoginController;
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

    $app->get('/', TareaController::class . ':getLogin');

    $app->post('/tareas', TareaController::class . ':login');

    $app->get('/logout', TareaController::class .':logout');

    $app->post('/filtrado', TareaController::class .':tareaFiltrada');


    $app->group('/usuarios',function(Group $group){
        $group->get('', TareaController::class .':listaUsuarios');
        $group->get('/{id}/delete', TareaController::class . ':deleteUser');
        $group->delete('/{id}', TareaController::class . ':destroyUser');
        $group->get('/create', TareaController::class . ':createUser');
        $group->post('/create', TareaController::class . ':storeUser');
        $group->get('/{id}/update', TareaController::class . ':editUser');
        $group->put('/{id}/update', TareaController::class . ':updateUser');
    });

    $app->group('/tareas',function(Group $group){
        $group->get('', TareaController::class .':index');
        $group->get('/pendientes', TareaController::class .':pendientes');
        $group->get('/create', TareaController::class . ':create');
        $group->get('/{id}', TareaController::class . ':show');
        $group->get('/{id}/delete', TareaController::class . ':delete');
        $group->delete('/{id}', TareaController::class . ':destroy');
        $group->post('/create', TareaController::class . ':store');
        $group->get('/{id}/update', TareaController::class . ':edit');
        $group->put('/{id}/update', TareaController::class . ':update');
        $group->get('/{id}/complete', TareaController::class . ':complete');
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
