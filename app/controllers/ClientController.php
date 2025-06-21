<?php

namespace app\controllers;

use Flight;
use flight\Engine;
class ClientController {
    private $app;
    public function __construct(){
        
    }
    public function tousClients(){
        $clients = Flight::dolibarr()::get('thirdparties');
        $data = [
            'clients' => $clients
        ];
        Flight::render('listeClients',$data);
    }
    public function formClient(){
        $data = [
            'title' => 'Ajouter un client'
        ];
        Flight::render('formulaireClient',$data);
    }

    public function insererClient(){

        $postData = Flight::request()->data;
        $data = [
            'name'=> $postData['nom'],
            'phone'=> $postData['phone'],
            'email'=> $postData['email'],
            'address'=> $postData['adresse'],
            'capital'=> $postData['capital']
        ];
        $client = Flight::dolibarr()::post('thirdparties',$data);
        if($client){
            Flight::redirect('/'); 
        }else{
            echo 'misy erreurs';
        }

    }
    public function supprimerClient($id){
        $client = Flight::dolibarr()::delete('thirdparties',$id); 
        var_dump($client);
        if($client){
            Flight::redirect('/');
        }
    }
    public function formModif($id){
        $clients= Flight::dolibarr()::getById('thirdparties',$id);   
        var_dump($clients);
        // $data = [
        //     'title' => 'Modifier un client',
        //     'client' => $clients
        // ];
        // Flight::render('formulaireClient',$data);
    }


    // public function insertion(){
    //     echo 'cou';
    //     Flight::render('formulaire');
    // } 

    
}
