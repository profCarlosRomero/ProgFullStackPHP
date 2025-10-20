<?php

require_once '../app/model/Database.php';

class PartidaUsuario {
    private $pdo;
    

    public function create($idPartida, $ciJugador) {
        $this->pdo = Database::getInstancia()->getConexion();
        
        $sentencia = "INSERT INTO partidaUsuario (id, ci) VALUES (:id, :ci)";
        
        $st = $this->pdo->prepare($sentencia);
        $st->bindParam(':id', $idPartida);
        $st->bindParam(':ci', $ciJugador);
        
        return $st->execute();
    }

    public function getPartidaUsuarios($idPartida) {
        $this->pdo = Database::getInstancia()->getConexion();

        $sentencia = "SELECT * FROM partidaUsuario WHERE id = :idPartida";

        $st = $this->pdo->prepare($sentencia);
        $st->bindParam(':idPartida', $idPartida);

        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

}