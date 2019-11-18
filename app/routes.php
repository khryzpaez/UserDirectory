<?php
use MiladRahimi\PhpRouter\Router;
use \App\Controllers\PublicController\PublicController;
use \App\Middlewares\AuthMiddleware;
use \App\Middlewares\GuestMiddleware;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use Zend\Diactoros\Response\TextResponse;
$router = new Router();

$router->get('/', PublicController::class.'@showLogin', GuestMiddleware::class);
$router->get('/contactos/listar', PublicController::class.'@index', AuthMiddleware::class);
$router->get('/usuarios/registro', PublicController::class.'@showRegister', GuestMiddleware::class);

$router->post('/usuarios/crear', PublicController::class.'@storeUser', GuestMiddleware::class);
$router->get('/usuarios/crear', PublicController::class.'@showRegister', GuestMiddleware::class);

$router->post('/usuarios/login', PublicController::class.'@login', GuestMiddleware::class);
$router->get('/usuarios/login', PublicController::class.'@showLogin', GuestMiddleware::class);

$router->get('/usuarios/logout', PublicController::class.'@logout', AuthMiddleware::class);

try {
    $router->dispatch();
} catch (RouteNotFoundException $e) {
    $router->getPublisher()->publish(new TextResponse('404 Página no encontrada'));
} catch (Throwable $e) {
    $router->getPublisher()->publish(new TextResponse('404 Página no encontrada'));
}