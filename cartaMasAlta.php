<?php
/**
 *   SCRIPT DEL JUEGO
 *   @author Juan Martinez Perez
 *   @version 1.0.7
 *   
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Carta Más Alta</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/cartaMasAlta.css">
</head>
<body>
    <h1>Juego Carta Más Alta</h1>
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
            "1" => 1,
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


    //ARRAY DE NOMBRES DE JUGADORES
    $listaJugadores = [
        //creamos el array con jugadores
        'Juan',
        'Colegadaw',
        'Samuel',
        'Carlos',
        'Effrain',
        'David',
        'Laura',
        'Hasbulla',
        'Miguel',
        'Carmen'
    ];

    //BARAJAR LAS CARTAS
    shuffle($deck);


    //SELECCIONAR JUGADORES
    $jugadorAleatorio1 = $listaJugadores[array_rand($listaJugadores)]; //do while para que no se repita el mismo jugador
    do {
        $jugadorAleatorio2 = $listaJugadores[array_rand($listaJugadores)];
    } while ($jugadorAleatorio1 == $jugadorAleatorio2);



    //REPARTO DE JUGADORES
    $jugadores = [
        ["name" => $jugadorAleatorio1, "cartas" => [], "score" => 0],
        ["name" => $jugadorAleatorio2, "cartas" => [], "score" => 0]
    ];

    //echo '<div class="mesaJuego"';
    
    //REPARTIR CARTAS A CADA JUGADOR
    function mostrarCartas($jugador, $cartas, $clases)
    {
        echo "Reparto de cartas de $jugador:<br>";
        echo '<div class="mano">';
        foreach ($cartas as $index => $carta) {
            $clase = isset($clases[$index]) ? $clases[$index] : '';
            echo '<img class="' . $clase . '" src="/img/baraja/' . $carta["image"] . '" alt="' . $carta["value"] . ' de ' . $carta["suit"] . '">';
        }
        echo '</div>';
    }




    //DIVIDIR EN EL REPARTO DE CARTAS
    for ($i = 0; $i < 20; $i++) {
        $carta = array_pop($deck);
        $jugadores[$i % 2]["cartas"][] = $carta;
    }


    //COMPARAR CARTAS Y PUNTOS
    for ($i = 0; $i < 10; $i++) {
        $jugador1Cartas = $jugadores[0]["cartas"][$i];
        $jugador2Cartas = $jugadores[1]["cartas"][$i];

        if (valorCartas($jugador1Cartas) == valorCartas($jugador2Cartas)) {
            $jugadores[0]["score"]++;
            $jugadores[1]["score"]++;
        } else if (valorCartas($jugador1Cartas) > valorCartas($jugador2Cartas)) {
            $jugadores[0]["score"] += 2;
            $clasesJugador1[$i] = 'ganadora'; //añadir clase a la carta ganadora del jugador 1
        } else {
            $jugadores[1]["score"] += 2;
            $clasesJugador2[$i] = 'ganadora'; //añadir clase a la carta ganadora del jugador 2
        }
    }
    
    mostrarCartas($jugadorAleatorio1, $jugadores[0]["cartas"], $clasesJugador1);
    mostrarCartas($jugadorAleatorio2, $jugadores[1]["cartas"], $clasesJugador2);

    echo '<div class="puntuacion">';

    //MOSTRAR PUNTOS Y RESULTADOS
    echo "Resultado: <br>";
    foreach ($jugadores as $jugador) {
        echo $jugador["name"] . ": " . $jugador["score"] . " puntos<br> ";
    }

    if ($jugadores[0]["score"] == $jugadores[1]["score"]) {
        echo "<b> EMPATE </b>";
    } else if ($jugadores[0]["score"] > $jugadores[1]["score"]) {
        echo $jugadores[0]["name"] . " <b> ha ganado ! </b> ";
    } else if ($jugadores[0]["score"] < $jugadores[1]["score"]) {
        echo $jugadores[1]["name"] . " <b> ha ganado ! </b> ";
    } else {
        echo " No gana nadie"; //no se puede dar
    }

    echo '</div>';



    ?>


</body>

</html>