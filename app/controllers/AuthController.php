<?php

namespace app\controllers;

use Flight;
use app\models\HabitationModel;
use flight\Engine;
class AuthController {
    private $app;
    public function __construct(){
        
    }

    public function home() {
        Flight::render('index');
    }

    public function tonga() {
        Flight::render('tonga');
    }
}
