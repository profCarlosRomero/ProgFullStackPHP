<?php

require_once '../app/model/Database.php';

class Partida {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Database::getInstancia()->getConexion();
    }

    public function create($currentDate) {
        $sentencia = "INSERT INTO partida (fecha) VALUES (:fecha)";
        
        $st = $this->pdo->prepare($sentencia);
        $st->bindParam(':fecha', $currentDate);

        $st->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function getById($id) {
        $sentencia = "SELECT * FROM partida WHERE id = :id";

        $st = $this->pdo->prepare($sentencia);
        $st->bindValue(":id", $id);

        $st->execute();
        $auxPartida = $st->fetch(PDO::FETCH_ASSOC);
        if ($auxPartida !== false) {
            return $auxPartida;
        } else {
            return;
        }
    }

    
}