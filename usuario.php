<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Usuarios</title>
</head>

<body style="background-color: lawngreen;">
    <header>
        <?php require_once("Partes/Menu.php")?>
    </header>
    <br>
    <!-- Modal guardar -->
    <div class="modal fade" id="usuarioaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">guardar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="usuarios/insertarusuario.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> usuario</label>
                            <input type="text" name="username" class="form-control" placeholder="username">
                        </div>

                        <div class="form-group">
                            <label>correo</label>
                            <input type="text" name="correo" class="form-control" placeholder="correo">
                        </div>

                        <div class="form-group">
                            <label> password</label>
                            <input type="text" name="password" class="form-control" placeholder="password">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- modal modificar -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> modificar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="usuarios/updateusuario.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label>usuario</label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="username">
                        </div>

                        <div class="form-group">
                            <label>correo</label>
                            <input type="text" name="correo" id="correo" class="form-control"
                                placeholder="correo">
                        </div>

                        <div class="form-group">
                            <label>password</label>
                            <input type="text" name="password " id="password" class="form-control"
                                placeholder="password">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">actualizar datos</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Eliminar datos </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="usuarios/deleteusuario.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Esta seguro que quiere eliminar un dato??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Si, eliminar </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">
            <div class="card text-center">
                <h2>USUARIOS</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#usuarioaddmodal">
                        Agregar Usuario
                    </button>
                    <div class="input-group">
 
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection, 'alcaldia');

            $query = "SELECT * FROM users";
            $query_run = mysqli_query($connection, $query);
        ?>
                    <table id="datatableid" class="table table-bordered table-primary">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">username</th>
                                <th scope="col">correo</th>
                                <th scope="col">password</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php
            if($query_run)
            {
                foreach($query_run as $row)
                {
        ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['username']; ?> </td>
                                <td> <?php echo $row['correo']; ?> </td>
                                <td> <?php echo $row['password']; ?> </td>
                                
                                <td>
                                    <button type="button" class="btn btn-success editbtn"> EDITAR</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn"> ELIMINAR </button>
                                </td>
                            </tr>
                        </tbody>
                        <?php           
                }
            }
            else 
            {
                echo "No Record Found";
            }
        ?>
                    </table>
                </div>
            </div>


        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
    $(document).ready(function() {

        $('.deletebtn').on('click', function() {

            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);

        });
    });
    </script>

    <script>
    $(document).ready(function() {

        $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#username').val(data[1]);
            $('#correo').val(data[2]);
            $('#password').val(data[3]);
            
        });
    });
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>