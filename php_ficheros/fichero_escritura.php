<?php

    // Aquí recibimos el valor de lo que ha escrito el usuario
    // Y que se pasa a través de la etiqueta name

    $producto = $_REQUEST['producto'];
    $precio = $_REQUEST['precio'];

    // Con w --> vacía el contenido
    // Con a+ --> lo añade
    // Con /n --> añade y da un salto de línea 
    // Si no existe el fichero lo crea
    // Si existe lo vacía
    
    $f = fopen("Productos.txt","a+");

    //Grabamos los datos en el fichero
    fputs($f, $producto. "|" . $precio . "\n");

    // Función de cerrar fichero
    fclose($f);

    // PINTAR TABLA HTML**************************************

    $html = "<table border ='1'>";
    //Metemos las cabeceras
    $html.= "<tr>";
        $html.= "<th>Producto</th>";
        $html.= "<th>Precio</th>";
    $html.= "</tr>";

    //Abrir fichero, con la r lo leemos
    $fichero = fopen("Productos.txt", "r");

    //Recorrer colección sacando la información separando las columnas
    //por el valor que hemos indicado en el fichero separador.

    while (!feof($fichero)){
        $linea = fgets($fichero);
        //Comprobamos que la línea no esté vacía
        if($linea != ""){
           
            echo "<br>" . $linea;
            //Datos separados por caracter
            $datosSepadados = explode("|", $linea);
            echo $datosSepadados[0] . $datosSepadados[1];
    
            // //Rellenamos los datos de la tabla
            $html.= "<tr>";
                $html.= "<td>" . $datosSepadados[0] . "</td>";
                $html.= "<td>" . $datosSepadados[1] . "</td>";
            $html.= "</tr>";
        }
       
    }

    $html.= "</table>";
    echo $html;

    //Cerrar fichero
    fclose($fichero);

?>