<?php
    //Regla de oro de envío de datos
    //Al hacer submit de un formulario se envían los values 
    // de todos los campos que tengan name, excepto los checkbox y los radios no marcados

    //Como recibe la información PHP
    //Automáticamente genera una variable especial que se llama $_REQUEST['name']
    
    echo "Nombre: " . $_REQUEST['nombre'];
    echo "<br>Apellidos: "  . $_REQUEST['apellidos'];
    echo "<br>Edad: "  . $_REQUEST['edad'];

    echo "<br><br>";

    $resultado = $_REQUEST['n1'] + $_REQUEST['n2'];
    
    echo "La suma es: " . $resultado;
?>
