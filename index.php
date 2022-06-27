<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
        body{
            margin-left: 100px;
            margin-right: 100px;
            margin-top: 40px;
            margin-bottom: 20px;
        }
        .resaltar{
            color:#f00;
            font-weight: bold;
        }

        h1{
		    text-align:center;
        }

        .no_validado{
            font-size:18px;
            color:#F00;
            font-weight:bold;
        }
        
        .validado{
            font-size:18px;
            color:#0C3;
            font-weight:bold;
        }

        .table{
            width: 50%;
        }
    </style>

    <!--FUNCION DE BISQUEDA EN EL MISMO FICHERO-->
    <?php
        function ejecuta_consulta($labusqueda){
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

            $consulta3="SELECT * FROM ARTÍCULOS WHERE NOMBREARTICULO LIKE'%$labusqueda%'";
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
        }
    ?>

</head>
<body>
    <h2>INTRODUCCION Y SINTAXIS PHP</h2>
    <p>Introduccion al lenguaje PHP, referente a la sintaxis desde cero hasta arrays pasando por programacion orientada a objetos.</p>
    <?php
        //Curso de PHP: https://www.youtube.com/watch?v=IOdmCo_7U6s&list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_&index=4&ab_channel=pildorasinformaticas
        //Para acceder al phpMyadmin se debe introducir user root y contraseña la misma que tengo cuando instale mysql 
        print "Hola bienvenido a PHP <br>";
        //En PHP no es lo mimso "" que '' , las comillas simples escribe el literal el mismo texto que has puesto entre las comillas 
        //tambien se suelen utilizar dentro de las comillas dobles 
        $nombre="Juan";
        $edad=31;
        //Para concatenar se usa el puntoi (.)
        print "El nombre es: " . $nombre . " y tiene " . $edad . "<br>";
        //Tambien se puede imprimir con la palabra echo se usa mas porque es mas rapida y ahorra recursos 
        
        include("funciones.php");
        dameDatos();
        //Existe include y require la diferencia entre ambos es que con el include si existe un fallo en el archivo que se incluye 
        //el funcinamineto del programa sigue en cambio con require no el programa se para donde da el problema.

        /*
        En PHP existen las variables locales, globales y las super globales en este caso las super globales se usan para poder 
        acceder a ellas incluso de otro archivo, este tipo de variables se declaran como arrays.
        Para declarar una variable global se antepone la palabra global al nombre de la funcion  

        -Variables estaticas: se utiliza para almacenar un valor de una variable declarada dentro de una funcion para operaciones 
        consecutivas, normalmente todas las variables locales se eliminan cuandos se cierra la funcion a menos que se declaren como 
        estaticas, es decir para conservar su valor cuando salga de una funcion.  
        */

        function incrementaVariable(){
            static $contador=0;
            $contador++;
            echo $contador . "<br>";
        }

        echo "Uso de las variables static <br>";
        incrementaVariable();
        incrementaVariable();
        incrementaVariable();

        /*
        Strings: 
        */

        echo "<p class='resaltar'>Esto es un ejemplo de frase</p>";
        //Concatenamos strings 
        echo "Hola mi nombre es $nombre <br>";
        //Comparacion de strings, strcmp compara considerando las mayusculas, mientras que strcasecmp no.
        $var1="Casa";
        $var2="CASA";
        $resultado=strcmp($var1,$var2); //devuelve 1 si no son iguales 0 si lo son 
        echo "El resultado es: " . $resultado . "<br>";
        


    ?>

    <h1>USANDO OPERADORES COMPARACIÓN</h1>
    <!--En action le estas diciendo que se comunique con index.html pero puedes colocar el codigo php en otro archivo y hacer que se llame 
        ha ese archivo.
    -->
    <form action="index.php" method="post" name="datos_usuario" id="datos_usuario">
        <table width="15%" align="center">
            <tr>
            <td>Nombre:</td>
            <td><label for="nombre_usuario"></label>
            <input type="text" name="nombre_usuario" id="nombre_usuario"></td>
            </tr>
            <tr>
            <td>Edad:</td>
            <td><label for="edad_usuario"></label>
            <input type="text" name="edad_usuario" id="edad_usuario"></td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td colspan="2" align="center"><input type="submit" name="enviando" id="enviando" value="Enviar"></td>
            </tr>
        </table>
    </form>

    <?php
        //isset — Determina si una variable está definida y no es null
        //POST nos permite recuperar datos enviados desde formularios con el método POST. ($_POST["enviando o id o name"])
        //comprueba si hemos pulsado el boton 
        if (isset($_POST["enviando"])) {
            //almacenamos lo que ha introducido el usuario en la variable usuario.
            $usuario=$_POST["nombre_usuario"];
            $edad=$_POST["edad_usuario"];
            if ($usuario == "Juan" && $edad>=18) {
                echo "Puedes entrar <br>";
            }else{
                echo "No puedes entrar <br>";
            }
        }
    ?>

    <?php
        /*
        Constantes: como una variable pero se almacenara un valor que no podra cambiar durante la ejecucion del programa 
        se declaran de la siguiente manera: define("NOMBRE_CONSTANTE",valor);
        Solo pueden almacenar valores escalares.
        Tambien existen constantes predefinidas de php en el siguiente enlace podras verlas: https://www.php.net/manual/es/language.constants.predefined.php
        */

        define("AUTOR","Juan");
        echo "El nombre de la constante es: ". AUTOR . "<br>";
        echo "Algunas de las constantes predefindias son: <br>";
        echo "La linea es: " . __LINE__ . "<br>";
        echo "El archivo es: " . __FILE__ . "<br>";

        /*
        Casteo de tipos e variables 
        */
        $num1="5"; 
        $resultado1=(int)$num1;
        echo "El resultado sin hacer casteo es: " . $resultado1 . "<br>";

        /*
        Condicionales un bucle if de toda la vida o la opcion corta: condicion ? Valor si verdadero : Valor si falso  
        En el condicional de arriba tambien podriamos a ver hecho esto: 
        echo $edad<18 ? "Eres menor" : "Eres mayor";
        */

        /*
        Funciones predefinidas: https://www.php.net/manual/es/indexes.functions.php
        Funciones propias y parametros de funciones # function suma($num1,$num2){}
        Funciones por valor: function ejemplo($param){}
        Funcioens por referencia: function ejemplo(&$param){}
        Al hacer un paso de parametro por referencia ya no se encapsula en la propia funcion lo hagas con esa variable cambiara 
        el valor de la misma fuera de la funcion, en cambio cuando se pasa por valor solo ese cambio se realiza dentro de la funcion 
        */
        
        function incrementa(&$valor1){
            $valor1++;
            return $valor1;
        }
        $numero=5;
        echo incrementa($numero) . "<br>";
        echo $numero . "<br>";
    ?>

    <h2>PROGRAMACION ORIENTADA A OBJETOS POO</h2>
    <p>En este apartado mostraremos todo lo referente a POO todas las clases creadas se definiran en el archivo clases.php</p>

    <?php
        //incluimos el archivo de clases 
        include("clases.php");

        $renault= new Coche();
        $iveco= new Camion();

        

        /*
        La herencia en POO: gracias a la herencia podemos reutilizar codigo
        Con la instruccion parent podemos llamar al metodo de la clase padre 
        */

        $iveco->frenar();

        /*
        Modularizacion: dividir el programa en pequeñas clases y conectadas entre ellas 
        Modificadores de acceso: 
            1º Public: accesible desde cualquier parte 
            2º Private: accesible desde la propia clase 
            3º Protected: accesible desde la propia clase y clases heredadas 
        */

        /*
        Variables y metodos estaticos: cuando tu declaras un metodo estatico significa que pertenece unicamente a la clase donde se ha creado 
        eso significa que ninguno de los objetos creados de esta clase tiene ese metodo o copia de el. Para hacer referencia a un atributo 
        estatico ya no se usa this sino (self::)
        */

        //Aplicamos el descuento del gobierno cuando queramos para ello llamamos a la funcion estatica descuento_gobierno de la siguiente manera: 
        Compra_vehiculo::descuento_gobierno();

        $compra_Antonio=new Compra_vehiculo("compacto");
        $compra_Antonio->climatizador();
        $compra_Antonio->tapiceria_cuero("blanco");
        echo  $compra_Antonio->precio_final() . "<br>";

        $compra_Ana=new Compra_vehiculo("compacto");
        $compra_Ana->climatizador();
        $compra_Ana->tapiceria_cuero("rojo");
        echo  $compra_Ana->precio_final() . "<br>";

        /*
        Arrays en PHP: 
        */

        //Array indexado
        $semana=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
        echo $semana[0] . "<br>";

        //Array asociativo (campo valor) es decir el valor queda indentificado con un nombre no con un indice 
        $datos=array("Nombre"=>"Juan","Apellido"=>"Diaz","Edad"=>31);
        echo $datos["Apellido"] . "<br>";

        //Verificar, recorrer, añadir y ordenar un array 
        //Con la funcion is_array podemos saber si una variable pertenece a un array 
        //Para recorrer un array se puede usar el bucle for pero para el caso de arrays asociativos es mas facil usar el foreach 

        //Agregamos un valor al array semana 
        $semana[]="Domingo";

        //Agregar un valor al array asociativo 
        $datos["Pais"]="España";

        foreach($datos as $clave=>$valor){
            echo "A $clave le corresponde $valor <br>"; 
        }

        for ($i=0; $i < count($semana) ; $i++) { 
            echo $semana[$i] . "<br>";
        }

        //Arrays multidimensionales 
        $alimentos=array("Fruta"=>array("tropical"=>"kiwi","citrico"=>"mandarina","otros"=>"manzana"),
                        "Leche"=>array("animal"=>"vaca","vegetal"=>"coco"),
                        "Carne"=>array("vacuno"=>"lomo","cerdo"=>"pata"));

        echo "<br>";
        //imprimimos un solo elemento
        //echo $alimentos["Carne"]["vacuno"];
        foreach ($alimentos as $clave_alim => $alim) {
            echo "$clave_alim:<br>";
            foreach($alim as $indice => $valor){
                echo "$indice=$valor<br>";
            }
            echo "<br>";
        }

        //con var_dump, puedes imprimir el array directamente 
        echo var_dump($alimentos);
    ?>
    <br>
    <br>
    <h2>SQL Y BASES DE DATOS</h2>
    <p>
        En este apartado haremos consultas desde la web a la base de datos y todo lo relacionado con PHP y bases de datos.
        Las consultasd de SQL se hacen con el comando select.
    </p>

    <?php
        /* 
        Conexion con base de datos: direccion de la BBDD, nombre de la BBDD, usuario de la BBDD y contraseña de la BBDD
        La conecion a la base de datos se puede hacer en modo orientado a objetos (clase Mysql) o por procedimientos (funcion mysql_connect) 
        */
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

        //ajustamos configuracion de idioma 
        mysqli_set_charset($conexion,"utf8");

        $resultado=$conexion->query("SELECT * FROM DATOSPERSONALES");
        $fila=$resultado->fetch_row();
        echo "El DNI es: " . $fila[0] . "<br>";
        echo "El Nombre es: " . $fila[1] . "<br>";
        echo "El Apellido es: " . $fila[2] . "<br>";
        echo "La Edad es: " . $fila[3] . "<br>";
        echo "<br>";
        //Esto inserta una nueva eprsona a la base de datos pero cada vez que lo ejecutes insertara el mismo en este caso
        //$conexion->query("INSERT INTO `datospersonales`(`NIF`, `NOMBRE`, `APELLIDO`, `EDAD`) VALUES ('53792134K','Pedro','Sanz',44)");

        //Importamos una nueva tabla y realizamos la consulta de otra manera diferente
        $consulta="SELECT * FROM ARTÍCULOS";
        $resultado2=mysqli_query($conexion,$consulta);

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

        while ($fila=mysqli_fetch_row($resultado2)){
            echo "
                <tbody>
                    <tr>
                        <td>$fila[0]</td>
                        <td>$fila[1]</td>
                        <td>$fila[2]</td>
                        <td>$fila[3]</td>
                        <td>$fila[4]</td>
                    </tr>
                </tbody>
            ";
        }
        echo "</table>";
                      
        //Funcion mysqli_fecth_array() y consulta con caracteres comodin que son: % (sustituye una cadena de caracteres) - (un unico caracter)
        //Ejemplo: %Caballero en la consulta indicamos que nos de todo lo que contenga algo + caballero usando la palabra LIKE  de sql.
        //Ejemplo real: SELECT * FROM ARTÍCULOS WHERE NOMBREARTICULO LIKE '%CABALLERO';
        //Para el caso del guion se puede usar en emdio de una palabra: CENI_ERO devolvera todas las palabras con ese patron 
       //esa funcion se usa para array asociativos, para evitar los incides de los campos 
       echo"<p>En este apartado hemos hecho una consulta a la base de datos mediante un mysqli_fecth_array(resultado3,MYSQLI_ASSOC) con esto podemos 
        acceder a los valores de las columnas <br> mediante su nombre fila['SECCION'], mostrando unicamente lo que queremos en este caso solo 4 campos de cinco.
       </p>";

       $consulta2="SELECT * FROM ARTÍCULOS WHERE PAISDEORIGEN='ESPAÑA'";
       $resultado3=mysqli_query($conexion,$consulta2);
        
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

        while ($fila=mysqli_fetch_array($resultado3, MYSQLI_ASSOC)){
            echo "<tbody><tr>";
                echo "<td>" . $fila['SECCION'] . "</td>";
                echo "<td>" . $fila['NOMBREARTICULO'] . "</td>";
                echo "<td>" . $fila['FECHA'] . "</td>";     
                echo "<td>" . $fila['PAISDEORIGEN'] . "</td>";          
            echo "</tr></tbody>";    
            
        }
        echo "</table>";

        //Creacion de formulario de busqueda y pagina de resultados 
        
        echo "
        <br>
        <form action='busqueda.php' method='get'>
            <p>Busqueda por nombre.</p>
            <div class='form-group w-25'>
                <label for='example2'> <input type='text' class='form-control' id='example2' name='buscar'></label>
                <button type='submit' class='btn btn-primary'>Buscar</button>
            </div>
            <br>
            
        </form>
        ";
        
        /*
        //Se ha dividido el sistema de busqueda en dos paginas php ahora lo haremos en una sola pagina 
        //Para ello hemos creado un funcion en el head y le pasamos como parametro lo que el usuario introduce a buscar 
        //Al realizar esta prueba da un error de que la variable buscar no esta definida pero es un error en local en un servidor real no pasa y funcionaria perfectamente 
        $mibusqueda=$_GET["buscar"];
        //Con _SERVER indicamos a la pagina que tiene que llamar y con PHP_SEL indicamos que llame a la misma pagina 
        $mipag=$_SERVER["PHP_SELF"];
        if ($mibusqueda != NULL) {
            ejecuta_consulta($mibusqueda);
        }else{
            echo "
                <br>
                <form action='" . $mipag ."' method='get'>
                    <p>Busqueda por nombre.</p>
                    <div class='form-group w-25'>
                        <label for='example2'> <input type='text' class='form-control' id='example2' name='buscar'></label>
                        <button type='submit' class='btn btn-primary'>Buscar</button>
                    </div>
                    <br>
                    
                </form>
            ";
        }
        */


        mysqli_close($conexion);
    ?>

   
    
   

</body>
</html>