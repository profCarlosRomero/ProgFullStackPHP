<?php

require_once __DIR__ . '/../model/Partida.php';
require_once __DIR__ . '/../model/PokeCard.php';
require_once __DIR__ . '/../model/PartidaUsuario.php';
require_once __DIR__ . '/../model/Usuario.php';

class PartidaController {

    private Partida $partidaModel;
    private Usuario $usuarioModel;
    private PartidaUsuario $partidaUsuarioModel;
    private PokeCard $pokeCardModel;

    public function create($j1CI, $j2CI) {
        $currentDate = date('Y-m-d');

        $this->partidaModel = new Partida();
        $auxPartidaID = $this->partidaModel->create($currentDate);
        $_SESSION['partidaID'] = $auxPartidaID;

        $this->partidaUsuarioModel = new PartidaUsuario();
        $this->partidaUsuarioModel->create($auxPartidaID, $j1CI);
        $this->partidaUsuarioModel->create($auxPartidaID, $j2CI);
        

        require_once __DIR__ . '/../view/tablero.view.php';
    }

    public function savePokes($partidaID) {
        header('Content-Type: application/json');

        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (isset($_POST['jugador'])) {
                    $auxJugador = (new Usuario())->getUserByUsername($_POST['jugador']);

                    $jsonPokes = $_POST['pokes'] ?? null;
                    $turno = $_POST['turno'] ?? null;
                    $ganador = $_POST['ganador'] ?? null;
                    if ($ganador != 0) {
                        $ganador = (new Usuario())->getUserByUsername($ganador);
                        $ganador = $ganador['ci'];
                    }

                    $this->pokeCardModel = new PokeCard();
                    $this->pokeCardModel->create(
                        $partidaID,
                        $auxJugador['ci'],
                        $turno, 
                        $ganador,
                        $jsonPokes
                    );
                    $mensaje = "OK";
                }

            }
        } catch (Exception $e) {
            $mensaje = $e;
            http_response_code(500);
            echo json_encode([
                "success" => false,
                "error" => $e->getMessage()
            ]);
        }
        echo json_encode([
            "jugador" => $auxJugador['ci'],
            "mensaje" => $mensaje
        ]);
    }

}