<?php

    // Vamos a recuperar los valores de la configuración de la conexión
    require_once ("configuracion_conexion.php");

    //Variable global de la consulta SQL
    $error = "";

    if(isset($_POST['alias'])){

        //Variables locales
        $user = $_POST['alias'];
        $pass = $_POST['pass'];

        //Consulta SQL --> Como el password lo hemos encriptado tenemos que desencriptarlo con md5
        $sql = "SELECT * FROM usuarios WHERE usu_alias = '$user' AND usu_password = md5('$pass');";

        //Conectamos a la BBDD
        $conexion = mysqli_connect(HOST,USER,PASS,BBDD);

        //Comprobamos el LOGIN
        $rs = mysqli_query($conexion, $sql);

        $datos = mysqli_fetch_all($rs, MYSQLI_ASSOC);

        //Desconexión
        mysqli_close($conexion);

        //Si el contador de datos es 0 almacenamos el error
        if(count($datos) == 0){

            $error = "Acceso incorrecto";

        } else {

            // Vamos a guardar los datos del usuario en variable de sesión
            // Iniciamos la sesión
            session_start();

            //Guardamos los datos del usuario
            $_SESSION['usuario_logueado'] = $datos[0];

            // Sentencia php para redirigir a la página de clientes
            header("Location:pedidos_form.php");
            exit();
        }       

    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

    <form action="" method="post">
        <label for="alias">ALIAS</label>
        <input type="text" name="alias" id="alias" placeholder="Alias">
        <br>
        <label for="pass">PASSWORD</label>
        <input type="password" name="pass" placeholder="Password">
        <br>
        <input type="submit" value="Login">
        <p id='p_error'>

        <?php            
            echo $error;          
        ?>

        </p>

    </form>
    
</body>
</html>