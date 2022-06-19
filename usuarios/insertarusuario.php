<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'alcaldia');

if(isset($_POST['insertdata']))
{
    $username= $_POST['username'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT); 
    

    $query = "INSERT INTO users(`username`,`correo`,`password`) VALUES ('$username','$correo','$password_hash')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: /alcaldiabueno/usuario.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>