<?php
    //En este apartado se Obtiene todos los datos del formulario se guardan en variables con _GET y despues e ponen dentro de la consulta 
    //Capturamos todos los datos que se introducen en el formulario 
    $seccion=$_GET["seccion"];
    $n_art=$_GET["n_art"];
    $fecha=$_GET["fecha"];
    $pais=$_GET["pais"];
    $precio=$_GET["precio"];

    require("conexionBD.php"); 
    //conexion con la base de datos 
    $conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
    /* comprobar la conexión */
    if (mysqli_connect_errno()) {
        echo "Fallo en la conexion";
    }
    else{
        echo "Se realizo la conexion con exito <br>";
    }

    $consulta3="INSERT INTO ARTÍCULOS(SECCION,NOMBREARTICULO,FECHA,PAISDEORIGEN,PRECIO) VALUES ('$seccion','$n_art','$fecha','$pais','$precio')";
    $resultado4=mysqli_query($conexion,$consulta3);

    //comprobamos y mostramos al usuario que todo ha ido bien o mal 
    if ($resultado4 == false) {
        echo'<script type="text/javascript">
        alert("Error al insertar");
        window.location.href="index.php";
        </script>';
    }else{
        echo'<script type="text/javascript">
        alert("Tarea Guardada");
        window.location.href="index.php";
        </script>';
    }

    mysqli_close($conexion);
?>