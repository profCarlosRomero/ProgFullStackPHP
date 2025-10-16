<?php

require_once __DIR__ . '/../model/Partida.php';
// require_once __DIR__ . '/../model/PokeCard.php';
// require_once __DIR__ . '/../controller/PokeCardController.php';
require_once __DIR__ . '/../model/Usuario.php';

class PartidaController {
    private string $jugador1;
    private array $pokesJ1;
    private string $jugador2;
    private array $pokesJ2;
    private int $turn;

    // public function __construct($j1, $j2) {
    //     $this->jugador1 = $j1;
    //     $this->jugador2 = $j2;
    //     $this->fillPokes();
    // }
    public function __construct() {
        
    }

    public function getJugador1() {
        return $this->jugador1;
    }
    public function getJugador2() {
        return $this->jugador2;
    }
    public function getPokesJ1() {
        return json_encode($this->pokesJ1);
    }
    public function getPokesJ2() {
        // return $this->pokesJ2;
        return json_encode($this->pokesJ2);
    }

    public function save() {
        // echo json_encode([
        //     "status" => "ok",
        //     "mensaje" => "Equipo recibido correctamente",
        //     "jugador" => $_POST['jugador']
        // ]);
        echo json_encode([
            "jugador" => $_POST['jugador'],
            "pokes" => $_POST['equipo']
        ]);

    }

}