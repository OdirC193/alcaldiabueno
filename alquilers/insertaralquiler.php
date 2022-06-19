<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

if(isset($_POST['insertdata']))
{
    $cantidad= $_POST['cantidad'];
    $nombre_articulo= $_POST['nombre_articulo'];
    $fecha_dereserva= $_POST['fecha_dereserva'];
   
    
    $query = "INSERT INTO alquiler(`cantidad`,`nombre_articulo`,`fecha_dereserva`) VALUES ('$cantidad','$nombre_articulo','$fecha_dereserva')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("registro guardado"); </script>';
        header('Location: /alcaldiabueno/alquiler.php');
    }
    else
    
    {
        echo '<script> alert("registro no guardado"); </script>';
    }
}

?>