<?php
    namespace App\Models;
    use Flight;
    use PDO;

class HabitationModel{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }

    // public function getHabitations(): array{
    //     try {
    //         $stmt = $this->db->prepare('SELECT * FROM ag_habitations');
    //         $stmt->execute();
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    //     } catch (PDOException $e) {
    //         error_log("Erreur lors de la récupération des habitations : " . $e->getMessage());
    //         return [];
    //     }
    // }
}