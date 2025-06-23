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

    public function showLoginForm() {
        $error = null;
        if (isset($_SESSION['flash_error'])) {
            $error = $_SESSION['flash_error'];
            unset($_SESSION['flash_error']);
        }
        Flight::render('auth/login', ['error' => $error]);
    }

    public function login() {
        $login = Flight::request()->data->login;
        $password = Flight::request()->data->password;

        $recuperation = 'login?login=' . urlencode($login) . '&password=' . urlencode($password);
        $response = Flight::dolibarr()::get($recuperation);

        if ($response && isset($response['success']['token'])) {
            $_SESSION['user_data'] = $response['success'];
            $_SESSION['user_token'] = $response['success']['token'];
            $_SESSION['is_logged_in'] = true;
            Flight::redirect('/dashboard');
        } else {
            $_SESSION['flash_error'] = "Invalid login or password";
            Flight::redirect('/login');
        }
    }

    public function logout() {
        session_destroy();
        Flight::redirect('/login');
    }
}
