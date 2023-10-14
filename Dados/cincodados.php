<?php
define('NDADOS', 6);

// Definir las caras de los dados
$caras = [1 => '&#9856;', 2 => '&#9857;', 3 => '&#9858;', 4 => '&#9859;', 5 => '&#9860;', 6 => '&#9861;'];

// Generar dados
function lanzarDados($ndados)
{
    $dados = [];
    for ($i = 0; $i < $ndados; $i++) {
        $dados[] = random_int(1, 6);
    }


    return $dados;
}

$jugador1 = lanzarDados(NDADOS);
$jugador2 = lanzarDados(NDADOS);



// Ordenar y elimina la puntuación del dado con el valor más alto y el dado con el valor más bajo
sort($jugador1);
sort($jugador2);
array_pop($jugador1);
array_pop($jugador2);
array_shift($jugador1);
array_shift($jugador2);


// Calcula la puntuación total para cada jugador
$puntuacion1 = array_sum($jugador1);
$puntuacion2 = array_sum($jugador2);

// Determina el ganador
if ($puntuacion1 > $puntuacion2) {
    $ganador = 'Jugador 1';
} elseif ($puntuacion2 > $puntuacion1) {
    $ganador = 'Jugador 2';
} else {
    $ganador = 'Empate';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
</head>

<body>
    <p style="font-size: 3em; color:red">
        Jugador 1: <br>
        <?php echo ($caras[$jugador1[0]]. $caras[$jugador1[1]]. $caras[$jugador1[2]]. $caras[$jugador1[3]]). " Puntuación: ". $puntuacion1; 
        ?>
    </p>
    <p style="font-size: 3em; color:blue">
        Jugador 2: <br>
        <?php echo ($caras[$jugador2[0]]. $caras[$jugador2[1]]. $caras[$jugador2[2]]. $caras[$jugador2[3]]). " Puntuación: ". $puntuacion2; ?>
    </p>
    <p style="font-size: 4em">
        Ganador:
        <?php echo $ganador; ?>
    </p>
</body>

</html>