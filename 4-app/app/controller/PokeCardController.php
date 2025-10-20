<?php

require_once __DIR__ . '/../model/PokeCard.php';

class PokeCardController {
    private $url = 'https://pokeapi.co/api/v2/pokemon/';

    public function __construct() {}

    public function getPokeApi() {
        $num = rand(1, 151);

        // Inicializar cURL
        $ch = curl_init($this->url . $num);

        // Opciones de cURL // Devolver respuesta como string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Ejecutar la petición
        $response = curl_exec($ch);

        // Cerrar conexión
        curl_close($ch);

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        $poke = new PokeCard(
            $data['name'],
            $data['sprites']['other']['official-artwork']['front_default']
        );
        $poke->setPokeStats($data['stats']);

        return $poke;
    }


}