<?php

    /* 
    Instrucciones de bucle (for) (foreach, while, so while)
    Permiten ejecutar instrucciones varias veces
    For es un generador de números, desde cual, hasta cual, de cuantos en cuantos.
    */

    $desde = 5;
    $hasta = 40;
    $intervalo = 2;
    for( $i = $desde; $i<$hasta; $i=$i+$intervalo){
        echo "<br>" .$i;
    }
    echo "<hr>";

    for($i=0; $i<10; $i++){
        echo "<br>Hola " . $i;
    }

    echo "<hr>";
    //Todos los números núltiples de 7 y de 11 desde el 1 hasta el 1000

    for($i=0; $i<100; $i++){
        If($i%7 == 0){
            echo "<br>El número " . $i . " es múltiplo de 7";
        }    
        If($i%11 == 0){
            echo "<br>El número " . $i . " es múltiplo de 11";
        }        
    }

    echo "<hr>";

    /*
        LISTAS
        Conjunto de valores que ocupan una posición
        Se manejan con arrays, tablas, vectores, etc...

        Array Unidimensional --> Sólo hay un dato por posición
        Arrays bidimensional --> En cada posición hay n datos
    */

    $lista = ["Pepe", "Ana", "Luis", "Jacinto"];

    for($i=0; $i < count($lista); $i++){
        echo "<br>" . $lista[$i];
    }

    echo "<hr>";

    $contactos = [["Paco", 123456789], ["Juan", 565656565], ["Eva", 5686544545]];

    echo "<br>" . $contactos [1][0] . " - " . $contactos [1][1];

    echo "<hr>";

    for($i=0; $i < count($contactos); $i++){
        echo "<br>" . $contactos[$i][0] . " - " . $contactos[$i][1];
    }

    echo "<hr>";

    $usuarios = [["Paco", 123456789, "rubio"], ["Juan", 565656565, "moreno"], ["Eva", 5686544545, "pelirrojo"]];

    for($i=0; $i < count($usuarios); $i++){
        echo "<br>" . $usuarios[$i][0] . " - " . $usuarios[$i][1] . " - " . $usuarios[$i][2];
    }

    echo "<hr>";

    //Saber número de filas y columnas

    for($i=0; $i < count($usuarios); $i++){
        echo "<br>Registro: " . count($usuarios[$i]);
        for($j=0; $j < count($usuarios); $j++){
            echo "<br>Número de elemento: " . count($usuarios[$j]);
        }
    }

    echo "<hr>";

    $registro = 1;
    $elemento = 1;

    for($i=0; $i < count($usuarios); $i++){
        echo "<br>Registro: " . $registro;
        $registro++;
        for($j=0; $j < count($usuarios); $j++){
           if($j > $registro){
                $elemento = 1;
                echo "<br>Número de elemento: " . $elemento;
           } else {
            echo "<br>Número de elemento: " . $elemento;
            $elemento++;
           };
        }
    }

    echo "<hr>";

    $coches = [
        ["9456 HHH", "Seat", "Blanco",2002],
        ["5644 AAA", "Kia", "Sportage",1985],
        ["2464 VVV", "Renault", "Rojo",2006],
        ["8845 HGY", "Ford", "Sierra", 2002],
        ["5668 KIK", "Toyota", "Prius", 2002]
    ];

    //tabla html

    $html = "<table border ='1'>";
    //Metemos las cabeceras
    $html.= "<tr>";
        $html.= "<th>Matricula</th>";
        $html.= "<th>Marca</th>";
        $html.= "<th>Modelo</th>";
        $html.= "<th>Año</th>";
    $html.= "</tr>";

    for($i=0; $i<count($coches); $i++){
        $html.= "<tr>";
            $html.= "<td>" . $coches[$i][0] . "</td>";
            $html.= "<td>" . $coches[$i][1] . "</td>";
            $html.= "<td>" . $coches[$i][2] . "</td>";
            $html.= "<td>" . $coches[$i][3] . "</td>";
        $html.= "</tr>";
    }   
    $html.= "</table>";
    echo $html;
    echo "<hr>";

    //Select para sacar listado de marcas

    $html2 = "<select>";
        for($i=0; $i<count($coches); $i++){       
            $html2.= "<option>" . $coches[$i][1] . "</option>";    
        };         
    $html2.= "</select>";

    echo $html2;
    echo "<hr>";

    //Lista desordenada

    $html2 = "<ul>";
        for($i=0; $i<count($coches); $i++){       
            $html2.= "<li>" . $coches[$i][1] . "</li>";    
        };         
    $html2.= "</ul>";

    echo $html2;
    echo "<hr>";

    //Lista ordenada

    $html2 = "<ol>";
        for($i=0; $i<count($coches); $i++){       
            $html2.= "<li>" . $coches[$i][1] . "</li>";    
        };         
    $html2.= "</ol>";

    echo $html2;
?>  