<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

if(isset($_POST['insertdata']))
{
    $idarriculo= $_POST['idarriculo'];
    $idempleado= $_POST['idempleado'];
    $fecha = $_POST['fecha'];
    $nombre_dealquilerdearticulo = $_POST['nombre_dealquilerdearticulo'];
   
     
    
    $query = "INSERT INTO inventario(`idarriculo`,`idempleado`,`fecha`,`nombre_dealquilerdearticulo`) VALUES ('$idarriculo','$idempleado','$fecha','$nombre_dealquilerdearticulo')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("registro guardado"); </script>';
        header('Location: /alcaldiabueno/inventario.php');
    }
    else
    
    {
        echo '<script> alert("registro no guardado"); </script>';
    }
}

?>