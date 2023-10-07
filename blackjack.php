<?php
/**
 *   SCRIPT DEL JUEGO
 *   @author Juan Martinez Perez
 *   @version 1.0.8
 *   
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blackjack</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/blackjack.css">
</head>
<body>
    <h1>Blackjack</h1>
    <?php
    require_once(__DIR__ . '/includes/NavBar.inc.php');

    //MAZO CARTAS
    $deck = [
        ["suit" => "corazones", "value" => "1", "image" => "cor_1.png"],
        ["suit" => "corazones", "value" => "2", "image" => "cor_2.png"],
        ["suit" => "corazones", "value" => "3", "image" => "cor_3.png"],
        ["suit" => "corazones", "value" => "4", "image" => "cor_4.png"],
        ["suit" => "corazones", "value" => "5", "image" => "cor_5.png"],
        ["suit" => "corazones", "value" => "6", "image" => "cor_6.png"],
        ["suit" => "corazones", "value" => "7", "image" => "cor_7.png"],
        ["suit" => "corazones", "value" => "8", "image" => "cor_8.png"],
        ["suit" => "corazones", "value" => "9", "image" => "cor_9.png"],
        ["suit" => "corazones", "value" => "10", "image" => "cor_10.png"],
        ["suit" => "corazones", "value" => "j", "image" => "cor_j.png"],
        ["suit" => "corazones", "value" => "q", "image" => "cor_q.png"],
        ["suit" => "corazones", "value" => "k", "image" => "cor_k.png"],
        ["suit" => "picas", "value" => "1", "image" => "pic_1.png"],
        ["suit" => "picas", "value" => "2", "image" => "pic_2.png"],
        ["suit" => "picas", "value" => "3", "image" => "pic_3.png"],
        ["suit" => "picas", "value" => "4", "image" => "pic_4.png"],
        ["suit" => "picas", "value" => "5", "image" => "pic_5.png"],
        ["suit" => "picas", "value" => "6", "image" => "pic_6.png"],
        ["suit" => "picas", "value" => "7", "image" => "pic_7.png"],
        ["suit" => "picas", "value" => "8", "image" => "pic_8.png"],
        ["suit" => "picas", "value" => "9", "image" => "pic_9.png"],
        ["suit" => "picas", "value" => "10", "image" => "pic_10.png"],
        ["suit" => "picas", "value" => "j", "image" => "pic_j.png"],
        ["suit" => "picas", "value" => "q", "image" => "pic_q.png"],
        ["suit" => "picas", "value" => "k", "image" => "pic_k.png"],
        ["suit" => "treboles", "value" => "1", "image" => "tre_1.png"],
        ["suit" => "treboles", "value" => "2", "image" => "tre_2.png"],
        ["suit" => "treboles", "value" => "3", "image" => "tre_3.png"],
        ["suit" => "treboles", "value" => "4", "image" => "tre_4.png"],
        ["suit" => "treboles", "value" => "5", "image" => "tre_5.png"],
        ["suit" => "treboles", "value" => "6", "image" => "tre_6.png"],
        ["suit" => "treboles", "value" => "7", "image" => "tre_7.png"],
        ["suit" => "treboles", "value" => "8", "image" => "tre_8.png"],
        ["suit" => "treboles", "value" => "9", "image" => "tre_9.png"],
        ["suit" => "treboles", "value" => "10", "image" => "tre_10.png"],
        ["suit" => "treboles", "value" => "j", "image" => "tre_j.png"],
        ["suit" => "treboles", "value" => "q", "image" => "tre_q.png"],
        ["suit" => "treboles", "value" => "k", "image" => "tre_k.png"],
        ["suit" => "rombos", "value" => "1", "image" => "rom_1.png"],
        ["suit" => "rombos", "value" => "2", "image" => "rom_2.png"],
        ["suit" => "rombos", "value" => "3", "image" => "rom_3.png"],
        ["suit" => "rombos", "value" => "4", "image" => "rom_4.png"],
        ["suit" => "rombos", "value" => "5", "image" => "rom_5.png"],
        ["suit" => "rombos", "value" => "6", "image" => "rom_6.png"],
        ["suit" => "rombos", "value" => "7", "image" => "rom_7.png"],
        ["suit" => "rombos", "value" => "8", "image" => "rom_8.png"],
        ["suit" => "rombos", "value" => "9", "image" => "rom_9.png"],
        ["suit" => "rombos", "value" => "10", "image" => "rom_10.png"],
        ["suit" => "rombos", "value" => "j", "image" => "rom_j.png"],
        ["suit" => "rombos", "value" => "q", "image" => "rom_q.png"],
        ["suit" => "rombos", "value" => "k", "image" => "rom_k.png"]
    ];



    //DAMOS VALOR A LAS CARTAS
    function valorCartas($carta)
    {
        $valores = [
            "1" => 11,
            "2" => 2,
            "3" => 3,
            "4" => 4,
            "5" => 5,
            "6" => 6,
            "7" => 7,
            "8" => 8,
            "9" => 9,
            "10" => 10,
            "j" => 10,
            "q" => 10,
            "k" => 10

        ];
        return $valores[$carta["value"]];
    }


    //BARAJAR LAS CARTAS
    shuffle($deck);





    //CALCULAR PUNTUACION
    function calcularPuntos($cartas)
    {
        $suma = 0;
        $as = 0;


        foreach ($cartas as $carta) {
            $valor = $carta["value"];
            if ($valor == "j" || $valor == "q" || $valor = "k") {
                $suma += 10;
            } else if ($valor == "1") {
                $as++;
                $suma += 11;
            } else {
                $suma += intval($valor);
            }
        }

        while ($suma > 21 && $as > 0) {
            $suma -= 10;
            $as--;
        }
        return $suma;
    }

    //ARRAY DE NOMBRES DE JUGADORES
    $listaJugadores = [
                    //creamos el array con jugadores
                    //la banca no entra aquí porque siempre juega
        'Juan',
        'Luke',
        'Samuel',
        'Laura',
        'Hasbulla',
        'Sander',
        'Harry',
        'Miguel',
        'Sara',
        'Mace',
        'Anakin',
        'Obi Wan',
        'Yoda'
    ];

    $mano = [];
    $jugadoresSeleccionados = [];

    //AGREGAMOS A LA BANCA QUE SIEMPRE JUEGA
    $banca = "Banca";
    $jugadoresSeleccionados[] = $banca;

    //AGREGAMOS A LOS JUGADORES
    for ($i = 0; $i < 5; $i++) {
        do {
            $jugadorAleatorio = $listaJugadores[array_rand($listaJugadores)];
        } while (in_array($jugadorAleatorio, $jugadoresSeleccionados));

        $jugadoresSeleccionados[] = $jugadorAleatorio;
    }

    //ASIGNAR A VARIABLES INDIVIDUALES
    list(
        $banca,
        $jugadorAleatorio1,
        $jugadorAleatorio2,
        $jugadorAleatorio3,
        $jugadorAleatorio4,
        $jugadorAleatorio5 ) = $jugadoresSeleccionados;

    //REPARTO DE JUGADORES
    $jugadores = [
        ["name" => $banca, "cartas" => [], "score" => 0],  //banca
        ["name" => $jugadorAleatorio1, "cartas" => [], "score" => 0],
        ["name" => $jugadorAleatorio2, "cartas" => [], "score" => 0],
        ["name" => $jugadorAleatorio3, "cartas" => [], "score" => 0],
        ["name" => $jugadorAleatorio4, "cartas" => [], "score" => 0],
        ["name" => $jugadorAleatorio5, "cartas" => [], "score" => 0]
    ];

    //INICIALIZAR VARIABLES DE LAS CLASES
    $clasesBanca = [];
    $clasesJugador1 = [];
    $clasesJugador2 = [];
    $clasesJugador3 = [];
    $clasesJugador4 = [];
    $clasesJugador5 = [];


    //PARA MOSTRAR CARTAS A CADA JUGADOR
    function mostrarCartas($jugador, $cartas, $clases, $score)
    {
        echo '<div class="jugadorEstilo">';
        echo "<h2>$jugador</h2>";
        echo '<div class="mano">';
        foreach ($cartas as $index => $carta) {
            $clase = isset($clases[$index]) ? $clases[$index] : '';
            echo '<img class="' . $clase . '" src="/img/baraja/' . $carta["image"] . '" alt="' . $carta["value"] . ' de ' . $carta["suit"] . '">';
        }
        echo "<div class='score'>Puntuación: $score</div>";
        echo '</div>';
        echo '</div>';
    }


    //DIVIDIR EN EL REPARTO DE CARTAS
    for ($i = 0; $i < 12; $i++) {
        $carta = array_pop($deck);
        $jugadores[$i % 6]["cartas"][] = $carta;
    }

    //COMPARAR CARTAS Y PUNTOS
    for ($i = 0; $i <2; $i++) {
        for ($j = 0; $j <= 5; $j++) {
            $jugadores[$j]["score"] += valorCartas($jugadores[$j]["cartas"][$i]);
        }
    }
    //SI UN JUGADOR TIENE MENOS DE 14 PUNTOS SE REPARTE OTRA CARTA
    for($j =0;$j <=5; $j++){
        while($jugadores[$j]["score"] <14){
            $cartaExtra = array_pop($deck);
            $jugadores[$j]["cartas"][] = $cartaExtra;
            $jugadores[$j]["score"] += valorCartas($cartaExtra);
        }
    }

    //ALMACENAR LOS SCORES TOTALES EN VARIABLES INDIVIDUALES
    $bancaCartasTotal = $jugadores[0]["score"];
    $jugador1CartasTotal = $jugadores[1]["score"];
    $jugador2CartasTotal = $jugadores[2]["score"];
    $jugador3CartasTotal = $jugadores[3]["score"];
    $jugador4CartasTotal = $jugadores[4]["score"];
    $jugador5CartasTotal = $jugadores[5]["score"];


    //MOSTRAR CARTAS
    echo '<div class="banca">';
    mostrarCartas($banca, $jugadores[0]["cartas"], $clasesBanca, $jugadores[0]["score"]);
    echo '</div>';

    echo '<div class="jugadores">';

    mostrarCartas($jugadorAleatorio1, $jugadores[1]["cartas"], $clasesJugador1, $jugadores[1]["score"]);
    mostrarCartas($jugadorAleatorio2, $jugadores[2]["cartas"], $clasesJugador2, $jugadores[2]["score"]);
    mostrarCartas($jugadorAleatorio3, $jugadores[3]["cartas"], $clasesJugador3, $jugadores[3]["score"]);
    mostrarCartas($jugadorAleatorio4, $jugadores[4]["cartas"], $clasesJugador4, $jugadores[4]["score"]);
    mostrarCartas($jugadorAleatorio5, $jugadores[5]["cartas"], $clasesJugador5, $jugadores[5]["score"]);
    echo '</div>';



    //GANADORES
    $puntuacionBanca = $jugadores[0]["score"];
    $resultados = [];

    foreach ($jugadores as $jugador) {
        if ($jugador["name"] != "Banca") {
            if ($jugador["score"] > 21) {
                $resultados[$jugador["name"]] = "Perdido";
            } elseif ($jugador["score"] > $puntuacionBanca || $puntuacionBanca > 21) {
                $resultados[$jugador["name"]] = "Ganado";
            } elseif ($jugador["score"] == $puntuacionBanca) {
                $resultados[$jugador["name"]] = "Empatado";
            } else {
                $resultados[$jugador["name"]] = "Perdido";
            }
        }
    }

    //VISUALIZAR GANADORES
    echo '<div class="resultados">';
    foreach ($resultados as $nombre => $resultado) {
        echo $nombre . " ha " . $resultado . "<br>";
    }
    echo '</div>';
    


    ?>

</body>

</html>