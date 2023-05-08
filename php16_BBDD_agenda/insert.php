<?php

    // Si recibo nombre --> insert

    if(isset($_REQUEST['nombre'])){
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $telefono = $_REQUEST['tel'];
        $email = $_REQUEST['email'];
        $observaciones = $_REQUEST['observaciones'];

        //Componemos la consulta sql
        $sql = "INSERT INTO contactos VALUES (NULL, '$nombre', '$apellidos', '$telefono', ' $email', '$observaciones');";

        //Conectar
        $cnx = mysqli_connect("localhost", "root", "", "agenda");

        //Insert
        $resul = mysqli_query($cnx, $sql);
        
        // Desconectar
        mysqli_close($cnx);

        echo "La contestaciónn es: " . $resul;

    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar contacto</title>
</head>
<body>

<?php

    //Variable SQL que almacena las consultas sql
    // $sql = "SELECT * FROM contactos WHERE nombre LIKE '%m%'";
    $sql = "SELECT * FROM contactos;";

    //Conexión a la BBDD
    $conexion = mysqli_connect("localhost","root","","agenda");

    //Trabajamos con la BBDD. rs -> Result Set
    $rs = mysqli_query($conexion, $sql);

    //Covierte los datos de la consulta en un array
    $datos_array = mysqli_fetch_all($rs);

    // //Mostramos los datos del Array en bruto
    // for($i=0; $i<count($datos_array); $i++){
    //     echo "<br>" . $datos_array[$i][1] . " - " 
    //                 . $datos_array[$i][2] . " - " 
    //                 . $datos_array[$i][3] . " - " 
    //                 . $datos_array[$i][4] . " - " 
    //                 . $datos_array[$i][5];
    // }

    echo "<hr>";

    //Datos en tabla html

    $html = "<table border ='1'>";

    //Metemos las cabeceras
    $html.= "<tr>";
        $html.= "<th>ID</th>";
        $html.= "<th>Nombre</th>";
        $html.= "<th>Apellidos</th>";
        $html.= "<th>Teléfono</th>";
        $html.= "<th>Email</th>";
        $html.= "<th>Observaciones</th>";
    $html.= "</tr>";
    
    for($i=0; $i<count($datos_array); $i++){
        $html.= "<tr>";
            $html.= "<td>" . $datos_array[$i][0] . "</td>";
            $html.= "<td>" . $datos_array[$i][1] . "</td>";
            $html.= "<td>" . $datos_array[$i][2] . "</td>";
            $html.= "<td>" . $datos_array[$i][3] . "</td>";
            $html.= "<td>" . $datos_array[$i][4] . "</td>";
            $html.= "<td>" . $datos_array[$i][5] . "</td>";
        $html.= "</tr>";
    }   
    $html.= "</table>";
    
    echo $html;

    //Desconexión
    mysqli_close($conexion);

    ?>

    <hr>

    <!-- Formulario de inserción -->

    <form action="" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos">
        <br> 
        <label for="tel">Teléfono</label>
        <input type="text" name="tel" id="tel">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <br>
        <label for="observaciones">Observaciones</label>
        <textarea name="observaciones" id="observaciones">
        </textarea>

        <button inputmode="submit">Añadir</button>

    </form>
    
</body>
</html>