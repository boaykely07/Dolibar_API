<?php
    namespace App\Models;
    use Flight;
    use PDO;

class StatusLabelModel{
    private $db;
    public function __construct(){

    }

    public static function getStatusLabel($fk_status){
        switch($fk_status){
            case "0": return "Brouillon";
            case "1": return "Ouvert";
            case "2": return "Assigné / En cours";
            case "3": return "Fermé";
            default: return "Inconnu";
        }
    }
}