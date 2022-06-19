<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $idarriculo= $_POST['idarriculo'];
        $idempleado= $_POST['idempleado'];
        $fecha= $_POST['fecha'];
        $nombre_dealquilerdearticulo= $_POST['nombre_dealquilerdearticulo'];

        $query = "UPDATE inventario SET idarriculo='$idarriculo', idempleado='$idempleado', fecha='$fecha', nombre_dealquilerdearticulo='$nombre_dealquilerdearticulo' WHERE idregistrociudadano='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location: /alcaldiabueno/inventario.php");
        }
        else
        {
            echo '<script> alert("el dato seleccionado no ha sido actualizado"); </script>';
        }
    }
?>
