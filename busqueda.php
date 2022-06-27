<?php
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

    $busqueda=$_GET["buscar"];
    $consulta3="SELECT * FROM ARTÍCULOS WHERE NOMBREARTICULO LIKE'%$busqueda%'";
    $resultado4=mysqli_query($conexion,$consulta3);
        
    echo "<br>";
    echo "
    <table class='table table-hover table-responsive table-bordered'> 
        <thead class='table-dark'>
            <tr>
            <th scope='col-md-3'>Seccion</th>
            <th scope='col-md-3'>Nombre</th>
            <th scope='col-md-3'>Fecha</th>
            <th scope='col-md-3'>Pais</th>
            <th scope='col-md-3'>Precio</th>
            </tr>
        </thead>
    ";

    while ($fila=mysqli_fetch_array($resultado4, MYSQLI_ASSOC)){
        echo "<tbody><tr>";
            echo "<td>" . $fila['SECCION'] . "</td>";
            echo "<td>" . $fila['NOMBREARTICULO'] . "</td>";
            echo "<td>" . $fila['FECHA'] . "</td>";     
            echo "<td>" . $fila['PAISDEORIGEN'] . "</td>";     
            echo "<td>" . $fila['PRECIO'] . "</td>";         
        echo "</tr></tbody>";    
        
    }
    echo "</table>";



    mysqli_close($conexion);

?>