<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

if(isset($_POST['insertdata']))
{
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $area_quetrabaja= $_POST['area_quetrabaja'];
    
    $query = "INSERT INTO empleados(`nombre`,`apellido`,`area_quetrabaja`) VALUES ('$nombre','$apellido','$area_quetrabaja')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("registro guardado"); </script>';
        header('Location: /alcaldiabueno/empleado.php');
    }
    else
    
    {
        echo '<script> alert("registro no guardado"); </script>';
    }
}

?>