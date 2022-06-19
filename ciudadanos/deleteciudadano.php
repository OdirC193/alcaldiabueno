<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

if(isset($_POST['deletedata2']))
{
    $id = $_POST['delete_id2'];

    $query = "DELETE FROM registro_ciudadano WHERE idregistrociudadano='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:/alcaldiabueno/ciudadano.php");
    }
    else
    {
        echo '<script> alert("Dato no eliminado"); </script>';
    }
}

?>