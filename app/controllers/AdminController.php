<?php

namespace app\controllers;

use Flight;

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
                // Dolibarr default statuses: 1-4=Open/In-progress, 5-6=Solved/Closed
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
} 