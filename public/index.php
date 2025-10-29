<?php
// Front Controller

ini_set('display_errors', 1);
error_reporting(E_ALL);

$route = $_GET['url'] ?? '';

// Ruteo simple
switch ($route) {

    case '':
    case 'home':
        require '../app/controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->home();
        break;

    case 'dashboard':
        require '../app/controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'pedidos/obtener':
        require '../app/controllers/PedidosController.php';
        $controller = new PedidosController();
        $controller->obtener();
        break;

    case 'login':
        require '../app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->showLogin();
    break;

    case 'auth/login':
        require '../app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
    break;

    case 'auth/logout':
        require '../app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
    break;

    case 'productos':
        require '../app/controllers/ProductosController.php';
        $controller = new ProductosController();
        $controller->index();
        break;
    
    case 'productos/obtener':
        require '../app/controllers/ProductosController.php';
        $controller = new ProductosController();
        $controller->obtener();
        break;

    case 'registro':
        require '../app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->showRegister();
        break;

    case 'auth/registro':
        require '../app/controllers/AuthController.php';
        $controller = new AuthController();
        $controller->register();
        break;

    case 'contacto':
        require '../app/controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->contacto();
        break;

    case 'pedidos/verificarSesion':
        require '../app/controllers/PedidosController.php';
        $controller = new PedidosController();
        $controller->verificarSesion();
        break;

    case 'pedidos/guardar':
        require '../app/controllers/PedidosController.php';
        $controller = new PedidosController();
        $controller->guardar();
        break;

    case 'gestionUsuarios':
        require '../app/controllers/UsuariosController.php';
        $controller = new UsuariosController();
        $controller->usuarios();
        break;

    default:
        http_response_code(404);
        echo "Página no encontrada";
        break;
}
