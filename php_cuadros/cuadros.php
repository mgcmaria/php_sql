<?php

    //Incluimos el fichero de conexión a la BBDD
    require_once("assets/conexion_BBDD/conexionBBDD.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadros</title>
    <link rel="stylesheet" href="assets/estilos/cuadros.css">
</head>
<body>

    <header>
        <h1>Cuadros de Velázquez</h1>
    </header>
    
    <section>  

        <!-- Accedemos a la BBDD con php -->
        <?php

            $sql = "SELECT * FROM cuadros WHERE cua_pin_id = 1;";

            //Conectar
            $cnx = mysqli_connect(HOST, USER, PASS, BBDD);

            //Trabajamos con la BBDD
            $rs = mysqli_query($cnx, $sql);

            //Datos
            $datos = mysqli_fetch_all($rs, MYSQLI_ASSOC);

            //Desconexión
            mysqli_close($cnx);

            $html = "";
            // Todos los datos están en $datos que es un array lo recorremos para pintar los registros
            for($i=0; $i<count($datos); $i++){

                //Variables que van a contener la información del cuadro
                $nombre = $datos[$i]['cua_nombre'];
                $foto = $datos[$i]['cua_foto'];
                $precio = $datos[$i]['cua_precio'];
            
                //Incluimos en un div la información del cuadro con su imagen
                $html.= "<div>";
                $html.= "   <img src ='assets/imagenes/$foto' alt= 'Cuadro $nombre'>";
                $html.= "   <p class = 'nombre'> $nombre </p>";
                $html.= "   <p class = 'precio'> Precio: $precio €</p>";
                $html.= "</div>";
            }

            echo $html;

        ?>

    </section>

    <footer>
        &copy; MGC - Mayo 2023
    </footer>
    
</body>
</html>