<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

if(isset($_POST['insertdata']))
{
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $genero = $_POST['genero'];
    $nombre_depadre = $_POST['nombre_depadre'];
    $nombre_demadre = $_POST['nombre_demadre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $lugar_nacimiento = $_POST['lugar_nacimiento'];
     
    
    $query = "INSERT INTO registro_ciudadano(`nombre`,`apellido`,`genero`,`nombre_depadre`,`nombre_demadre`,`fecha_nacimiento`,`lugar_nacimiento`) VALUES ('$nombre','$apellido','$genero','$nombre_depadre','$nombre_demadre','$fecha_nacimiento','$lugar_nacimiento')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("registro guardado"); </script>';
        header('Location: /alcaldiabueno/ciudadano.php');
    }
    else
    
    {
        echo '<script> alert("registro no guardado"); </script>';
    }
}

?>