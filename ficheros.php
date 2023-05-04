<?php
/*
    ficheros de texto
    Para trabajar con un fichero hay que:
        - Abrir fichero
        - Operar con él
        - Cerrar el fichero

    Modos de abrir los ficheros:

    r --> Read
    w --> Ecritura
    a+ --> Añadir
*/

/*
Para operar usaremos el while
Función de fin de fichero = feof
Para leer línea se haría con fgets

Fichero Excel consultar: 
https://parzibyte.me/blog/2019/02/14/leer-archivo-excel-php-phpspreadsheet/

*/

//Abrir fichero
$fichero = fopen("ficheros.txt", "r");

//Recorrer colección sacando la información de las líneas
while (!feof($fichero)){
    $linea = fgets($fichero);
    echo "<br>" . $linea;
}

//Cerrar fichero
fclose($fichero);

?>

<?php

echo "<hr>";

//Abrir fichero
$fichero = fopen("ficheros.txt", "r");

//Recorrer colección sacando la información separando columnas
while (!feof($fichero)){
    $linea = fgets($fichero);
    //Datos separados por caracter
    $datosSepadados = explode("|",$linea);
    echo "<br>Nombre: " . $datosSepadados[0] . " | Apellidos: " . $datosSepadados[1] . 
            " | Telefono: " . $datosSepadados[2];
}

echo "<hr><br>";

//Cerrar fichero
fclose($fichero);

?>


<?php

//DATOS CON TABLA HTML

$html = "<table border ='1'>";
//Metemos las cabeceras
$html.= "<tr>";
    $html.= "<th>Nombre</th>";
    $html.= "<th>Apellidos</th>";
    $html.= "<th>Telefono</th>";
$html.= "</tr>";

//Abrir fichero
$fichero = fopen("ficheros.txt", "r");

//Recorrer colección sacando la información separando las columnas
//por el valor que hemos indicado en el fichero separador.

while (!feof($fichero)){
    $linea = fgets($fichero);
    //Datos separados por caracter
    $datosSepadados = explode("|",$linea);

    //Rellenamos los datos de la tabla
    $html.= "<tr>";
        $html.= "<td>" . $datosSepadados[0] . "</td>";
        $html.= "<td>" . $datosSepadados[1] . "</td>";
        $html.= "<td>" . $datosSepadados[2] . "</td>";
    $html.= "</tr>";
}

$html.= "</table>";
echo $html;

//Cerrar fichero
fclose($fichero);

?>




