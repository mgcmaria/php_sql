<?php

    echo "Recibo como nombre " . $_REQUEST['nombre'];

    //Si existe $_REQUEST['mercedes'] es que has marcado mercedes

    //isset es una función que me dice si existe una variable

    if( isset ( $_REQUEST['mercedes'])) {
        echo "<br>Tienes un Mercedes";
    }
    if( isset ( $_REQUEST['audi'])) {
        echo "<br>Tienes un AUDI";
    }
    if( isset ( $_REQUEST['seat'])) {
        echo "<br>Tienes un SEAT";
    }
    if( isset ( $_REQUEST['pelo'])) {
        echo "<br>Tu pelo es de color" . $_REQUEST['pelo'];
    }

    echo "<br>Tus observaciones son: " . $_REQUEST['observaciones'];
    echo "<br>Tu nacionalidad es: " . $_REQUEST['nacionalidad']

?>