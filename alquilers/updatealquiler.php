<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $cantidad= $_POST['cantidad'];
        $nombre_articulo= $_POST['nombre_articulo'];
        $fecha_dereserva= $_POST['fecha_dereserva'];

        $query = "UPDATE alquiler SET cantidad ='$cantidad', nombre_articulo='$nombre_articulo', fecha_dereserva='$fecha_dereserva' WHERE idarriculo='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location: /alcaldiabueno/alquiler.php");
        }
        else
        {
            echo '<script> alert("el dato seleccionado no ha sido actualizado"); </script>';
        }
    }
?>