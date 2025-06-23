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


#admin
$router->group('/admin', function($router){
    global $Admin_Controller;
    $router->get('/dashboard', [ $Admin_Controller, 'index' ]);
    $router->get('/listeTickets', [ $Admin_Controller, 'getTickets' ]);

});



