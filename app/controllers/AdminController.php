<?php

namespace app\controllers;

use Flight;
use app\models\StatusLabelModel;

class AdminController {

    public function __construct() {
    }

    public function index() {
        $tickets = Flight::dolibarr()::get("tickets");

        $stats = [
            'total' => 0,
            'in_progress' => 0,
            'resolved' => 0,
            'other' => 0
        ];

        if (!empty($tickets)) {
            $stats['total'] = count($tickets);
            foreach ($tickets as $ticket) {
                if (isset($ticket['fk_statut'])) {
                    if ($ticket['fk_statut'] >= 5) {
                        $stats['resolved']++;
                    } else {
                        $stats['in_progress']++;
                    }
                } else {
                    $stats['other']++;
                }
            }
        }

        Flight::render('admin/dashboard', ['stats' => $stats]);
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

            if (isset($ticket['array_options']['options_date_de_debut'])) {
                $ticket['date_debut'] = date('d/m/Y', $ticket['array_options']['options_date_de_debut']);
            } else {
                $ticket['date_debut'] = 'Non renseigné';
            }
        
            if (isset($ticket['array_options']['options_date_de_fin'])) {
                $ticket['date_fin'] = date('d/m/Y', $ticket['array_options']['options_date_de_fin']);
            } else {
                $ticket['date_fin'] = 'Non renseigné';
            }
        }
        // var_dump($tickets);

        $data = [
            'tickets' => $tickets
        ];
        Flight::render('admin/listeTickets',$data);

    }
} 