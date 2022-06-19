<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        $nombre = $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $genero = $_POST['genero'];
        $nombre_depadre= $_POST['nombre_depadre'];
        $nombre_demadre = $_POST['nombre_demadre'];
        $fecha_nacimiento= $_POST['fecha_nacimiento'];
        $lugar_nacimiento= $_POST['lugar_nacimiento'];

        $query = "UPDATE registro_ciudadano SET nombre ='$nombre', apellido='$apellido', genero='$genero', nombre_depadre='$nombre_depadre',nombre_demadre='$nombre_demadre', fecha_nacimiento='$fecha_nacimiento', lugar_nacimiento='$lugar_nacimiento' WHERE idregistrociudadano='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Dato actualizado"); </script>';
            header("Location: /alcaldiabueno/ciudadano.php");
        }
        else
        {
            echo '<script> alert("el dato seleccionado no ha sido actualizado"); </script>';
        }
    }
?>
