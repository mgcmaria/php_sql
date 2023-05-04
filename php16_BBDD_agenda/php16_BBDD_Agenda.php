<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>

    <?php

    //Variable SQL que almacena las consultas sql
    $sql = "SELECT * FROM contactos WHERE nombre LIKE '%m%'";

    //Conexión a la BBDD
    $conexion = mysqli_connect("localhost","root","","agenda");

    //Trabajamos con la BBDD. rs -> Result Set
    $rs = mysqli_query($conexion, $sql);

    //Covierte los datos de la consulta en un array
    $datos_array = mysqli_fetch_all($rs);

    //Mostramos los datos del Array en bruto
    for($i=0; $i<count($datos_array); $i++){
        echo "<br>" . $datos_array[$i][1] . " - " 
                    . $datos_array[$i][2] . " - " 
                    . $datos_array[$i][3] . " - " 
                    . $datos_array[$i][4] . " - " 
                    . $datos_array[$i][5];
    }

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
    
</body>
</html>