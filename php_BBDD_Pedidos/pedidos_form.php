<?php

    // Imprimir valores de una variable, array, etc... para ver el valor
    // HTML tiene una etiqueta para eso que es "pre"
    // Tipos de ARRAY ORDINAL / ASOCIATIVO

    // echo "<pre>";
    //     //Con var_export nos dice lo que contiene
    //     var_export($_REQUEST);    
    // echo "</pre>";

    $filtro = ""; //Variable de filtro

    //Aquí comprobamos si el filtro está vacío para que nos traiga todos los datos isset
    //Si no está vacía almacenamos el valor de lo contrario se quedará vacía y traerá todos los registros
    if(isset($_REQUEST['filtro'])){
        $filtro = $_REQUEST['filtro'];
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBDD Pedidos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <!-- Creamos un formulario de consultas -->
    <!-- Metemos el valor de la variable filtro en el input para que el usuario sepa lo que está escribiendo.
            Con un bloque php para recoger la variable -->

    <form action="">
            <label for="filtro">Filtro por empresa y/o población</label>
            <input type="text" name="filtro" id="filtro" placeholder="Empresa/Población" value= <?php echo $filtro; ?> >
            <button>Enviar</button>
    </form>
    <hr>

    <!-- Creamos la tabla y la rellenamos con php -->

    <table class="table">   
        
        <!-- Metemos las cabeceras -->
        <tr>
            <th scope="col">Código de cliente</th>
            <th scope="col">Empresa</th>
            <th scope="col">Dirección</th>
            <th scope="col">Población</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Responsable</th>
            <th scope="col">Historial</th>
        </tr>

            <?php

                // Busqueda por empresa y/o población
                // La variable la vamos a decalarar al principio para dar el valor en el input               

                //Variable SQL que almacena las consultas sql
                $sql = "SELECT * FROM clientes WHERE cli_empresa LIKE '%$filtro%' OR cli_poblacion LIKE '%$filtro%'ORDER BY cli_empresa";

                //Conexión a la BBDD
                $conexion = mysqli_connect("localhost","root","Void1313*Void1313*"," id20665501_bd_pedidos");

                //Trabajamos con la BBDD. rs -> Result Set
                $rs = mysqli_query($conexion, $sql);

                //Covierte los datos de la consulta en un array
                $datos_array = mysqli_fetch_all($rs);
               
                for($i=0; $i<count($datos_array); $i++){
                    echo "<tr>";
                        echo "<td>" . $datos_array[$i][0] . "</td>";
                        echo "<td>" . $datos_array[$i][1] . "</td>";
                        echo "<td>" . $datos_array[$i][2] . "</td>";
                        echo "<td>" . $datos_array[$i][3] . "</td>";
                        echo "<td>" . $datos_array[$i][4] . "</td>";
                        echo "<td>" . $datos_array[$i][5] . "</td>";
                        echo "<td>" . $datos_array[$i][6] . "</td>";
                    echo "</tr>";
                }           
                
                    // // Imprimir valores de una variable, array, etc... para ver el valor
                    // // HTML tiene una eqtiqueta para eso que es pre
                    // echo "<pre>";
                    //     //Con var_export nos dice lo que contiene
                    //     var_export($datos_array);    
                    // echo "</pre>";

                //Desconexión
                mysqli_close($conexion);

            ?>

    </table>
    
</body>
</html>