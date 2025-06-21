<?php

namespace app\controllers;

use Flight;
use app\models\DolibarrModel;
use app\models\StatusLabelModel;
use flight\Engine;
class TicketController {
    private $app;
    public function __construct(){
        
    }

    public function getTickets() {
        $tickets = Flight::dolibarr()::get("tickets");

        foreach($tickets as &$ticket){
            if(isset($ticket['socid'])){
                $client = Flight::dolibarr()::getById("thirdparties",$ticket['socid']);
                $ticket['client_name'] = $client['name'];
                $ticket['client_email'] = $client['email'];
            }
            else{
                $ticket['client_name'] = "Non renseigné";
                $ticket['client_email'] = "Non renseigné";
            }

            if(isset($ticket['fk_statut'])){
                $ticket['status_label'] = StatusLabelModel::getStatusLabel($ticket['fk_statut']);
            }
            else{
                $ticket['status_label'] = "Non renseigné";
            }
        }
        // var_dump($tickets);

        $data = [
            'tickets' => $tickets
        ];
        Flight::render('listeTickets',$data);

    }
}
