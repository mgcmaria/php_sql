<?php

    // Vamos a recuperar los valores de la configuración de la conexión
    require_once ("configuracion_conexion.php");

    // Imprimir valores de una variable, array, etc... para ver el valor
    // HTML tiene una etiqueta para eso que es "pre"
    // Tipos de ARRAY ORDINAL / ASOCIATIVO

    // echo "<pre>";
    //     //Con var_export nos dice lo que contiene
    //     var_export($_REQUEST);    
    // echo "</pre>";

    session_start();

    //Si no existe el usuario es que no ha hecho Login
    if(!isset($_SESSION['usuario_logueado'])){
        header("location:login.php");
        exit();
    }

    // Declaración de Variables que se recogen en el $_REQUEST
    $filtro = ""; //Variable de filtro
    $cod_cliente = "";
    $empresa = "";
    $dirección = "";
    $poblacion = "";
    $telefono = "";
    $responsable = "";
    $historial = "";

    //Aquí comprobamos si el filtro está vacío para que nos traiga todos los datos isset
    //Si no está vacía almacenamos el valor de lo contrario se quedará vacía y traerá todos los registros
    if(isset($_REQUEST['filtro'])){
        $filtro = $_REQUEST['filtro'];
    }
    if(isset($_REQUEST['insert_codcli'])){
        $cod_cliente = $_REQUEST['insert_codcli'];
    }
    if(isset($_REQUEST['insert_empresa'])){
        $empresa = $_REQUEST['insert_empresa'];
    }
    if(isset($_REQUEST['insert_direccion'])){
        $dirección = $_REQUEST['insert_direccion'];
    }
    if(isset($_REQUEST['insert_poblacion'])){
        $poblacion = $_REQUEST['insert_poblacion'];
    }
    if(isset($_REQUEST['insert_telefono'])){
        $telefono = $_REQUEST['insert_telefono'];
    }
    if(isset($_REQUEST['insert_telefono'])){
        $responsable = $_REQUEST['insert_telefono'];
    }
    if(isset($_REQUEST['insert_historial'])){
        $historial = $_REQUEST['insert_historial'];
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="pedidos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
        <header>
            <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">Page 1-1</a></li>
                    <li><a href="#">Page 1-2</a></li>
                    <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
                </ul>
            </div>
            </nav>
        </header>
        
            <!-- Creamos un formulario de consultas -->
            <!-- Metemos el valor de la variable filtro en el input para que el usuario sepa lo que está escribiendo.
            Con un bloque php para recoger la variable -->

        <div class="d-flex justify-content-start">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <form class="d-flex" for="filtro">
                        <input class="form-control me-2" name="filtro" id="filtro" type="search" placeholder="Empresa/Población" aria-label="Search" value= <?php echo $filtro; ?>>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </a>
            </div>
        </nav>
        </div>

    <form action="">
            <label for="insert">Insertar nuevo cliente</label>
            <br>
            <input type="text" name="insert_codcli" id="insert" placeholder="Código cliente">
            <input type="text" name="insert_empresa" id="insert" placeholder="Empresa">
            <input type="text" name="insert_direccion" id="insert" placeholder="Dirección">
            <input type="text" name="insert_poblacion" id="insert" placeholder="Población">
            <input type="text" name="insert_telefono" id="insert" placeholder="Teléfono">
            <input type="text" name="insert_telefono" id="insert" placeholder="Responsable">
            <input type="text" name="insert_historial" id="insert" placeholder="Historial">
            <br><br>
            <button>Insertar</button>
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

                //Variable SQL que almacena las consultas sql
                $sql_insert = "INSERT INTO clientes (cli_codigo, cli_empresa, cli_direccion, cli_telefono, cli_responsable, cli_historial)
                VALUES ('$cod_cliente', '$empresa', '$dirección', ' $poblacion', '$telefono', '$responsable', '$historial');";

                //Conexión a la BBDD
                $conexion = mysqli_connect(HOST,USER,PASS,BBDD);

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

                //Insertar
                if($cod_cliente != ""){
                    $rs_insert = mysqli_query($conexion, $sql_insert);
                }

                //Desconexión
                mysqli_close($conexion);

            ?>

    </table>

    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-facebook-f"></i
            ></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-twitter"></i
            ></a>

            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-google"></i
            ></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-instagram"></i
            ></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-linkedin-in"></i
            ></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2023 Copyright:
          <a class="text-white" href="https://mdbootstrap.com/">MGCMARIA</a>
        </div>
        <!-- Copyright -->
    </footer>
    
</body>
</html>