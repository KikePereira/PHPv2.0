<?php

namespace App\Controllers;

use App\Models\TareaRepository;
use App\Models\Tarea;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

use App\Models\Usuario;
use App\Models\UserSession;

/**
 * TareaController
 * Esta es la clase que maneja el controlador de la web
 */
class TareaController
{
    private $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    /**
     * index
     *Funcion que controla la vista de Ver tareas en la web
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public static function index(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $view = Twig::fromRequest($request);

        if (isset($_SESSION['usuario'])) {

            $usuario = new Usuario;
            $usuario->setUser($_SESSION['usuario']);
            $pagina = filter_input(INPUT_GET, 'page');

            if (empty($pagina)) {
                $pagina = 1;
            }

            $cantTareas = 3;
            $tareas = TareaRepository::getTareasPag($cantTareas, $pagina);
            $paginas = TareaRepository::paginas($cantTareas);
            return $view->render($response, 'tareas.php', ['tareas' => $tareas, 'paginas' => $paginas, 'paginaActual' => $pagina, 'usuario' => $usuario]);
        } else {

            header("Location: /");
            exit();
        }
    }
    
    /**
     * pendientes
     *Funcion que controla la vista de Tareas Pendientes
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public function pendientes(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();

        if (isset($_SESSION['usuario'])) {
            $usuario = new Usuario;
            $usuario->setUser($_SESSION['usuario']);
            $view = Twig::fromRequest($request);

            $tareas = TareaRepository::getTareasPendientes();

            return $view->render($response, 'tareaspendientes.php', ['tareas' => $tareas, 'usuario' => $usuario]);
        } else {
            header("Location: /");
            exit();
        }
    }    
    /**
     * show
     *Funcion que controla ver una Tarea con toda su informacion en la web
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        session_start();

        if (isset($_SESSION['usuario'])) {
            $usuario = new Usuario;
            $usuario->setUser($_SESSION['usuario']);

            $view = Twig::fromRequest($request);
            $tareas = TareaRepository::TareaCompleta($args['id']);

            return $view->render($response, 'tareacompleta.php', ['tarea' => $tareas, 'usuario' => $usuario]);
        } else {
            header("Location: /");
            exit();
        }
    }
    
    /**
     * delete
     *Funcion que controla la vista de eliminar una tarea en la web, esta nos manda a la confirmacion de eliminacion
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public function delete(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();

        if (isset($_SESSION['usuario'])) {
            $usuario = new Usuario;
            $usuario->setUser($_SESSION['usuario']);
            $view = Twig::fromRequest($request);

            $tareas = TareaRepository::TareaCompleta($args['id']);
            return $view->render($response, 'deletetarea.php', ['tarea' => $tareas, 'usuario' => $usuario]);
        } else {
            header("Location: /");
            exit();
        }
    }
    
    /**
     * destroy
     *Funcion que elimina la tarea si confirmamos su eliminacion y nos manda a ver las tareas
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public function destroy(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $view = Twig::fromRequest($request);

        TareaRepository::EliminarTarea($args['id']);

        return self::index($request, $response, $args);
    }
    
    /**
     * create
     *Funcion que nos muestra la vista de crear una nueva tarea en la web
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public function create(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();

        if (isset($_SESSION['usuario'])) {
            $usuario = new Usuario;
            $usuario->setUser($_SESSION['usuario']);
            $view = Twig::fromRequest($request);
            $provincias = TareaRepository::getProvincias();
            $operarios = TareaRepository::getOperarios();
            return $view->render($response, 'addTarea.php', ['provincias' => $provincias, 'operarios' => $operarios, 'usuario' => $usuario]);
        } else {
            header("Location: /");
            exit();
        }
    }
    
    /**
     * store
     *Funcion que nos valida y nos sube la tarea o nos imprime el formulario con los errores devueltos
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public function store(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();

        if (isset($_SESSION['usuario'])) {
            $usuario = new Usuario;
            $usuario->setUser($_SESSION['usuario']);
            $view = Twig::fromRequest($request);

            $tarea = new Tarea(
                '',
                filter_input(INPUT_POST, 'dni'),
                filter_input(INPUT_POST, 'nombre'),
                filter_input(INPUT_POST, 'apellido'),
                filter_input(INPUT_POST, 'telefono'),
                filter_input(INPUT_POST, 'correo'),
                filter_input(INPUT_POST, 'direccion'),
                filter_input(INPUT_POST, 'poblacion'),
                filter_input(INPUT_POST, 'codigopostal'),
                filter_input(INPUT_POST, 'provincia'),
                /*ESTADO TAREA*/
                '',
                '',
                filter_input(INPUT_POST, 'operario'),
                filter_input(INPUT_POST, 'fecharealizacion'),
                filter_input(INPUT_POST, 'anotaciones'),
                ''
            );

            $error = $tarea->validar();
            if ($error->HayErrores() == 0) {
                TareaRepository::addTarea($tarea->dni, $tarea->nombre, $tarea->apellido, $tarea->telefono, $tarea->correo, $tarea->direccion, $tarea->poblacion, $tarea->codigo_postal, $tarea->provincia, $tarea->operario_encargado, $tarea->fecharealizacion, $tarea->anotacion_inicio);
                $ultimaTarea = TareaRepository::UltimaTarea();
                return $view->render($response, 'tareacompleta.php', ['tarea' => $ultimaTarea, 'usuario' => $usuario]);
            } else {
                $provincias = TareaRepository::getProvincias();
                $operarios = TareaRepository::getOperarios();
                return $view->render($response, 'addTarea.php', ['error' => $error, 'tarea' => $tarea, 'provincias' => $provincias, 'operarios' => $operarios, 'usuario' => $usuario]);
            }
        } else {
            header("Location: /");
            exit();
        }
    }
    
    /**
     * edit
     *Funcion que nos muestra el formulario para modificar una tarea, pasando por parametro todos los datos de la tarea, 
     *sacado desde la base de datos, a mostrar.
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public function edit(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();

        if (isset($_SESSION['usuario'])) {
            $usuario = new Usuario;
            $usuario->setUser($_SESSION['usuario']);
            $view = Twig::fromRequest($request);

            $provincias = TareaRepository::getProvincias();
            $operarios = TareaRepository::getOperarios();

            $tareas = TareaRepository::TareaCompleta($args['id']);

            return $view->render($response, 'updatetarea.php', ['tarea' => $tareas, 'provincias' => $provincias, 'operarios' => $operarios, 'usuario' => $usuario]);
        } else {
            header("Location: /");
            exit();
        }
    }
    
    /**
     * update
     *Funcion que controla el formulario de la modificacion, validandolo y subiendo las modificaciones, o por su contrario nos vuelve a mostrar la tarea
     *con su formulario para modificarla, en este caso recibe los errores de validacion por parametro 
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public function update(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();

        if (isset($_SESSION['usuario'])) {
            $usuario = new Usuario;
            $usuario->setUser($_SESSION['usuario']);
            $view = Twig::fromRequest($request);

            $tarea = new Tarea(
                filter_input(INPUT_POST, 'tarea_id'),
                filter_input(INPUT_POST, 'dni'),
                filter_input(INPUT_POST, 'nombre'),
                filter_input(INPUT_POST, 'apellido'),
                filter_input(INPUT_POST, 'telefono'),
                filter_input(INPUT_POST, 'correo'),
                filter_input(INPUT_POST, 'direccion'),
                filter_input(INPUT_POST, 'poblacion'),
                filter_input(INPUT_POST, 'codigo_postal'),
                filter_input(INPUT_POST, 'provincia'),
                filter_input(INPUT_POST, 'estado_tarea'),
                filter_input(INPUT_POST, 'fecha_creacion'),
                filter_input(INPUT_POST, 'operario'),
                filter_input(INPUT_POST, 'fecha_realizacion'),
                filter_input(INPUT_POST, 'anotacion_inicio'),
                filter_input(INPUT_POST, 'anotacion_final')
            );


            $error = $tarea->validar();
            if ($error->HayErrores() == 0) {
                TareaRepository::updateTarea($tarea);
                $tareaupdateada = TareaRepository::TareaCompleta($tarea->tarea_id);
                return $view->render($response, 'tareacompleta.php', ['tarea' => $tareaupdateada, 'usuario' => $usuario]);
            } else {
                $tareaoriginal = TareaRepository::TareaCompleta($tarea->tarea_id);
                $provincias = TareaRepository::getProvincias();
                $operarios = TareaRepository::getOperarios();
                return $view->render($response, 'updatetarea.php', ['error' => $error, 'tarea' => $tareaoriginal, 'provincias' => $provincias, 'operarios' => $operarios, 'usuario' => $usuario]);
            }

            return self::index($request, $response, $args);
        } else {
            header("Location: /");
            exit();
        }
    }
    
    /**
     * complete
     *Funcion que nos muestra el formulario de completar, solo podiendo modificar el estado, apareciendo este ya en Realizada, y las anotaciones finales
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public function complete(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();

        if (isset($_SESSION['usuario'])) {
            $usuario = new Usuario;
            $usuario->setUser($_SESSION['usuario']);
            $view = Twig::fromRequest($request);
            $tareas = TareaRepository::TareaCompleta($args['id']);
            return $view->render($response, 'completeTarea.php', ['tarea' => $tareas, 'usuario' => $usuario]);
        } else {
            header("Location: /");
            exit();
        }
    }

    //LOGIN
    
    /**
     * login
     *Funcion que nos controla el login y las sesiones de la web
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public static function login(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $view = Twig::fromRequest($request);
        $userSession = new UserSession();
        $user = new Usuario();
        $error = '<span style=color:red;>*Nombre o Contraseña invalido*</span>';

        if (isset($_SESSION['usuario'])) {
            return self::index($request, $response, $args);
        } else if (!empty($_POST['nombre']) && !empty($_POST['password'])) {
            if ($user->userExists($_POST['nombre'], $_POST['password'])) {
                $userSession->setCurrentUser($_POST['nombre']);
                $hora = date('h:i:s');
                $hora = strval($hora);
                Usuario::updateLogin($_POST['nombre'], $hora);
                $user->setUser($_POST['nombre']);

                return self::index($request, $response, $args);
            } else {
                return $view->render($response, 'login.php', ['error' => $error]);
            }
        } else {
            return $view->render($response, 'login.php', ['error' => $error]);
        }
    }
    
    /**
     * logout
     *Funcion que nos cierra la sesion del usuario
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public static function logout(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $userSession = new UserSession;

        $userSession->closeSession();
        header("Location: /");
        exit();
    }
    
    /**
     * getLogin
     *Funcion que nos muestra el formulario login si no hay sesion iniciad, si existiera sesion iniciada nos ingresa al inicio de la web con dicha sesion
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $args
     * @return ResponseInterface
     */
    public static function getLogin(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        session_start();
        if(isset($_SESSION['usuario'])){
            return self::index($request, $response, $args);
        }
        $view = Twig::fromRequest($request);
        return $view->render($response, 'login.php', []);
    }
}
