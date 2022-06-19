<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        $nombre = $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $area_quetrabaja = $_POST['area_quetrabaja'];
       
        $query = "UPDATE empleados SET nombre ='$nombre', apellido='$apellido', area_quetrabaja='$area_quetrabaja' WHERE idempleado='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Dato actualizado"); </script>';
            header("Location: /alcaldiabueno/empleado.php");
        }
        else
        {
            echo '<script> alert("el dato seleccionado no ha sido actualizado"); </script>';
        }
    }
?>
