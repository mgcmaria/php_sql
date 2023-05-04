<?php
    // Tratamiento de datos si los recibo
    if (isset($_REQUEST['nombre']) && $_REQUEST['nombre']!="" ){
        // Proceso (Grabar los datos en agenda.txt)
        //      Abro el fichero en modo añadir (a+)
        $fichero = fopen("assets/ficheros/agenda.txt","a+");
        //      Compongo la línea a escribir
        $linea = $_REQUEST['nombre'] . "#" . $_REQUEST['telefono'] . "#" . $_REQUEST['email'] . "#" . $_REQUEST['relacion'] . "\n";
        //      Grabo la línea en el fichero
        fputs($fichero, $linea);
        //      Cierro el fichero
        fclose($fichero);
    }    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDA</title>
</head>

<body>
    <!-- Si el campo action  está vacío, los datos se envían al mismo programa -->
    <form action="" method="post">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" autocomplete="off" required>
        </div>
        <div>
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" autocomplete="off" required>
        </div>
        <div>
            <label for="email">Correo electrónico</label>
            <input type="text" name="email" id="email" autocomplete="off" required>
        </div>
        <div>
            <label for="relacion">Relación</label>
            <select name="relacion" id="relacion">
                <option>Familia</option>
                <option selected>Amigos</option>
                <option>Trabajo</option>
                <option>Otros</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Grabar">
            <input type="reset" value="Limpiar">
        </div>
    </form>

    <div>
        <table>
            <tr>
                <th>NOMBRE</th>
                <th>TELEFONO</th>
                <th>EMAIL</th>
                <th>RELACIÓN</th>
            </tr>
            <?php
            // Mostrar los datos del fichero
            //      Abrir en modo lectura
            $fichero = fopen("assets/ficheros/agenda.txt", "r");
            //      Leer las líneas y pintarlas en el div
            //      Mientras no sea final de fichero
            while ( !feof($fichero) ){
                //  Lees linea
                $linea = fgets($fichero);
                //  Si no está vacía, la procesas
                if ($linea != ""){
                    // Separar los campos de la línea en la variable $datos
                    $datos = explode("#", $linea);
                    // Pintar fila
                    echo "<tr>";
                    echo "  <td>" . $datos[0] . "</td>";
                    echo "  <td>" . $datos[1] . "</td>";
                    echo "  <td>" . $datos[2] . "</td>";
                    echo "  <td>" . $datos[3] . "</td>";
                    echo "</tr>";
                }
            }
            //      Cerrar el fichero
            fclose($fichero);
        ?>
        </table>
    </div>
</body>

</html>