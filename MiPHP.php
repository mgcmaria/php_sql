<?php

    //Variables
    $precio = 300;
    $nombre = "María";
    $cantidad = 100;

    $importe = $precio * $cantidad;

    echo "<h1> El importe es " .  $importe . "</h1>";

    // Ejecutar: localhost/carpeta/nombre_del_programa.php
    // Siempre dentro de la carpeta htdocs

    $goles = 40;
    $partidos = 10;
    $goles_por_partido = $goles / $partidos;

    echo "<br>Media de goles: " . $goles_por_partido;

    echo "<br>Cubo de 2: " . 2**3;

    //Formas de incrementar variables
    $contador = 0;
    $contador = $contador + 1;
    $contador++;
    $contador+=1;
    $contador*=3;

    echo "<br> El valor de contador es: " . $contador;

    //Resto

    $resto = $contador % 2;

    echo "<br> El resto de contador es: " . $resto;
    
    $DNI = 51939481;
 
    echo "<br>Me corresponde la letra del DNI: " . $DNI % 23;

?>