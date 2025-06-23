<?php

use flight\Engine;
use flight\net\Router;
use app\controllers\HomeController;
use app\controllers\ClientController;
use app\controllers\TicketController;
use app\controllers\AuthController;
use app\controllers\AdminController;


/** 
 * @var Router $router 
 * @var Engine $app
 */

$app->before('start', function(&$params, &$output){
    session_start();
});

Flight::map('auth_check', function() {
    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
        Flight::redirect('/login');
        exit();
    }
});


$Home_Controller = new HomeController();
$Client_Controller = new ClientController();
$Ticket_Controller = new TicketController();
$Auth_Controller = new AuthController();
$Admin_Controller = new AdminController();

$router->get('/login', [ $Auth_Controller, 'showLoginForm' ]);
$router->post('/login', [ $Auth_Controller, 'login' ]);
$router->get('/logout', [ $Auth_Controller, 'logout' ]);

$router->get('/', function() {
    if (!empty($_SESSION['is_logged_in'])) {
        Flight::redirect('/dashboard');
    } else {
        Flight::redirect('/login');
    }
});

$router->get('/dashboard', [$Admin_Controller, 'index'])->addMiddleware(['auth_check']);

#Gestion des tickets
$router->group('/tickets', function($router){
    global $Ticket_Controller;
    $router->get('/listeTickets', [ $Ticket_Controller, 'getTickets' ]);
}, ['auth_check']);




