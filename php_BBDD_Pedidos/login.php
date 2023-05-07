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
    
    <link rel="stylesheet" href="login.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>

    <!-- Section: Design Block -->
    <section class=" text-center text-lg-start">
      
      <div class="card mb-3" id="fondo">
        <div class="row g-0 d-flex align-items-center">
          <div class="col-lg-4 d-none d-lg-flex">
            <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
              class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
          </div>
          <div class="col-lg-8">
            <div class="card-body py-5 px-md-5">
    
              <form action="" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form2Example1" class="form-control" name="alias"/>
                  <label class="form-label" for="form2Example1">User</label>
                </div>
    
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form2Example2" class="form-control" name="pass"/>
                  <label class="form-label" for="form2Example2">Password</label>
                </div>
    
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                      <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                  </div>
    
                  <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                  </div>
                </div>
    
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                <p id='p_error'>

                    <?php            
                        echo $error;          
                    ?>

                    </p>

    
              </form>
    
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->

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