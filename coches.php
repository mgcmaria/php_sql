<?php
$coches = [
        ["9456 HHH", "Seat", "Blanco",2002],
        ["5644 AAA", "Kia", "Sportage",1985],
        ["2464 VVV", "Renault", "Rojo",2006],
        ["8845 HGY", "Ford", "Sierra", 2002],
        ["5668 KIK", "Toyota", "Prius", 2002]
    ];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coches</title>
    <link rel="stylesheet" href="coches.css">
</head>
<body>

    <header></header>
    <nav>
        <?php

            $html2 = "<select>";
            for($i=0; $i<count($coches); $i++){       
                $html2.= "<option>" . $coches[$i][1] . "</option>";    
            };         
            $html2.= "</select>";

            echo $html2;
        ?>

    </nav>
    <aside>

        <?php

            $html2 = "<ol>";
            for($i=0; $i<count($coches); $i++){       
                $html2.= "<li>" . $coches[$i][1] . "</li>";    
            };         
            $html2.= "</ol>";
            echo $html2;
        ?>
    </aside>
    <section>

        <?php
            $html = "<table border ='1'>";
            //Metemos las cabeceras
            $html.= "<tr>";
                $html.= "<th>Matricula</th>";
                $html.= "<th>Marca</th>";
                $html.= "<th>Modelo</th>";
                $html.= "<th>Año</th>";
            $html.= "</tr>";
        
            for($i=0; $i<count($coches); $i++){
                $html.= "<tr>";
                    $html.= "<td>" . $coches[$i][0] . "</td>";
                    $html.= "<td>" . $coches[$i][1] . "</td>";
                    $html.= "<td>" . $coches[$i][2] . "</td>";
                    $html.= "<td>" . $coches[$i][3] . "</td>";
                $html.= "</tr>";
            }   
            $html.= "</table>";
            echo $html;
        ?>

    </section>
    <footer></footer>
    
</body>
</html>