<?php

require_once __DIR__ . '/../model/Database.php';

class PokeCard {
    private $pdo;


    public function create($partidaID, $jugadorCI, $turno, $ganador, $pokeCard) {
        $this->pdo = Database::getInstancia()->getConexion();

        $sentencia = "INSERT INTO partidaUsuarioCard(id, ci, turno, ganador, pokemon) VALUES (:id, :ci, :turno, :ganador, :pokemon)";
        $st = $this->pdo->prepare($sentencia);
        $st->bindParam(':id', $partidaID);
        $st->bindParam(':ci', $jugadorCI);
        $st->bindParam(':turno', $turno);
        $st->bindParam(':ganador', $ganador);
        $st->bindParam(':pokemon', $pokeCard);

        $st->execute();
    }

}