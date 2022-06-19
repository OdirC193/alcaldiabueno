<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $username = $_POST['username'];
        $correo= $_POST['correo'];
        $password = $_POST['password'];
        $password_hash = password_hash($password,PASSWORD_BCRYPT);

        $query = "UPDATE users SET username ='$username', correo='$correo', password='$password_hash' WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location: /alcaldiabueno/usuario.php");
        }
        else
        {
            echo '<script> alert("el dato seleccionado no ha sido actualizado"); </script>';
        }
    }
?>