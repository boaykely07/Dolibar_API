<?php

use flight\Engine;
use flight\net\Router;
use app\controllers\HomeController;
use app\controllers\ClientController;
use app\controllers\TicketController;


/** 
 * @var Router $router 
 * @var Engine $app
 */



// Middleware d'authentification

// Flight::map('auth_check', function() {
//     session_start();
//     if (!isset($_SESSION['user_id'])) {
//         Flight::redirect('/login');
//         exit();
//     }
// });


$Home_Controller = new HomeController();
$Client_Controller = new ClientController();
$Ticket_Controller = new TicketController();




// Route par défaut redirige vers le login
//$router->get('/', [ $Client_Controller, 'tousClients' ]); 
$router->get('/formClient', [ $Client_Controller, 'formClient' ]); 
$router->post('/ajouterClient', [ $Client_Controller, 'insererClient' ]);

$router->get('/supprimerClient/@id', [ $Client_Controller, 'supprimerClient' ]);
$router->get('/formModif/@id', [ $Client_Controller, 'formModif' ]);

//groupe crm


$router->get('/', [ $Ticket_Controller, 'getTickets' ]);



