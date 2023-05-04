<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBDD Pedidos</title>
</head>
<body>

    <?php

        /* Posibles consultas:
            - Filtro de precio entre 100 y 200 y que sean de la sección juguetería
                SELECT * FROM productos WHERE prod_precio > 100 AND prod_precio > 200 AND prod_seccion = 'jugueteria';
            - Sacar los 10 productos más caros ordenados por precio
                SELECT * FROM productos ORDER BY prod_precio DESC LIMIT 10;
            - Sacar los 10 productos más baratos ordenados por precio de china
                SELECT * FROM productos WHERE prod_pais_origen = 'china' ORDER BY prod_precio DESC LIMIT 10;
            - Filtrar las secciones que tiene
                SELECT DISTINCT prod_seccion
                FROM productos
                ORDER BY prod_seccion;
        */

        //Variable SQL que almacena las consultas sql
        $sql = "SELECT * FROM clientes";

        //Conexión a la BBDD
        $conexion = mysqli_connect("localhost","root","","bd_pedidos");

        //Trabajamos con la BBDD. rs -> Result Set
        $rs = mysqli_query($conexion, $sql);

        //Covierte los datos de la consulta en un array
        $datos_array = mysqli_fetch_all($rs);


        /*Para Mostrar los datos del Array en bruto
        for($i=0; $i<count($datos_array); $i++){
            echo "<br>" . $datos_array[$i][1] . " - " 
                        . $datos_array[$i][2] . " - " 
                        . $datos_array[$i][3] . " - " 
                        . $datos_array[$i][4] . " - " 
                        . $datos_array[$i][5] . " - " 
                        . $datos_array[$i][6];
        }
        echo "<hr>";
        */

        // Sacamos los Datos de la tabla de clientes en tabla html

        $html = "<table border ='1'>";

        //Metemos las cabeceras
        $html.= "<tr>";
            $html.= "<th>Código de cliente</th>";
            $html.= "<th>Empresa</th>";
            $html.= "<th>Dirección</th>";
            $html.= "<th>Población</th>";
            $html.= "<th>Teléfono</th>";
            $html.= "<th>Responsable</th>";
            $html.= "<th>Historial</th>";
        $html.= "</tr>";
        
        for($i=0; $i<count($datos_array); $i++){
            $html.= "<tr>";
                $html.= "<td>" . $datos_array[$i][0] . "</td>";
                $html.= "<td>" . $datos_array[$i][1] . "</td>";
                $html.= "<td>" . $datos_array[$i][2] . "</td>";
                $html.= "<td>" . $datos_array[$i][3] . "</td>";
                $html.= "<td>" . $datos_array[$i][4] . "</td>";
                $html.= "<td>" . $datos_array[$i][5] . "</td>";
                $html.= "<td>" . $datos_array[$i][6] . "</td>";
            $html.= "</tr>";
        }   
        $html.= "</table>";
        
        echo $html;

        //Desconexión
        mysqli_close($conexion);

    ?>
    
</body>
</html>