<?php
    require 'conn/conn.php';
    session_start();
    if(isset($_SESSION['logged'])){
        //echo "Stay here";
        $userType = $_SESSION['userType'];
        if($userType != 4){
            header("location: ./homepac.php");
        }
    }else{
        header("location: ./login.php");
    }
?>
<!doctype html>
<html lang="en">

<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="css/dashboard-admin.css">
    <link rel="stylesheet" href="assets/css/table.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Atiendeme - Menejo Secretaria</title>
</head>

<body>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">Administrador</h4>
            </div>
            <div class="menu">
                <a href="dashboard.php" class="d-block text-light p-3 border-0 ">Home</a>
                <a href="doctores.php" class="d-block text-light p-3 border-0 ">Doctores</a>
                <a href="consultorios.php" class="d-block text-light p-3 border-0 ">Centros</a>
                <a href="manejosec.php" class="d-block text-light p-3 border-0 active-menu-option">Secretarias</a>
                <a href="servicios.php" class="d-block text-light p-3 border-0 ">Servicios</a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/usuario.jpg" class="img-fluid rounded-circle avatar mr-2"
                                        alt="https://generated.photos/" />
                                    <?php echo $_SESSION['userName']." ".$_SESSION['userLastName']; ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Mi perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Fin Navbar -->

            <!-- Page Content -->
            <div id="content" class="bg-grey w-100">

                <section class="bg-mix py-3">
                    <div class="container">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="row">

                                    <div class="container-xl">
                                        <div class="table-responsive">
                                            <div class="table-wrapper">
                                                <div class="table-title">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h2>Manejar <b>Secretarias</b></h2>
                                                        </div>
                                                        <div class="col-sm-6">
                                                        <?php
                                                                if($userType == 4){ ?>
                                                                    <a href="#addSecretariaModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nueva secretaria</span></a>
                                                                <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Contacto</th>
                                                            <th></th>
                                                            <th>Dirección</th>
                                                            <th>Centros</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $stmt_select_secretarias =  $PDO_conn->prepare("SELECT * FROM secretarias");
                                                            $stmt_select_secretarias->execute([]);
                                                            while ($row_secretarias = $stmt_select_secretarias->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <tr>
                                                                <td><?php echo $row_secretarias['name']; ?></td>

                                                            <td><?php echo $row_secretarias['email']; ?> | <?php echo $row_secretarias['phone']; ?></td>

                                                            <td></td>
                                                            
                                                            <td><?php echo $row_secretarias['address']; ?></td>
                                                            
                                                            <td>
                                                                <ul>
                                                                    <?php
                                                                    $stmt_select_centers_secretarias =  $PDO_conn->prepare("SELECT * FROM centers_secretaria WHERE secretaria_id = ?");
                                                                    $stmt_select_centers_secretarias->execute([$row_secretarias['id']]);
                                                                    while ($row_center_secretaria = $stmt_select_centers_secretarias->fetch(PDO::FETCH_ASSOC)) {
                                                                        $stmt_select_centers =  $PDO_conn->prepare("SELECT * FROM centros WHERE id = ?");
                                                                        $stmt_select_centers->execute([$row_center_secretaria['center_id']]);
                                                                        while ($row_center = $stmt_select_centers->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <li><?php echo $row_center['name']; ?></li>
                                                                    <?php    }
                                                                    }
                                                                    ?>
                                                                </ul>

                                                            </td>
                                                            <td>
                                                                <a href="#addSecretariaModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                                <a href="#deleteSecretariaModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                            </td>
                                                        </tr>
                                                            <?php } ?>

                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Modal HTML -->
                                    <div id="addSecretariaModal" class="modal fade">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form method="POST" action="controller/add_secretaria.php">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Agregar secretaria</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Nombre</label>
                                                                    <input type="text" class="form-control" name="name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label>Correo</label>
                                                                    <input type="email" class="form-control" name="email" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Teléfono</label>
                                                                    <input type="text" class="form-control" name="phone" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Centros</label>
                                                                    <select class="form-control" id="centros-modal-select" required name="centros[]" multiple="multiple">
                                                                            <?php
                                                                                $stmt_select_centers =  $PDO_conn->prepare(" SELECT * FROM centros ");
                                                                                $stmt_select_centers->execute([$row_doctors['id']]);
                                                                                while ($row_center = $stmt_select_centers->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                            <option value="<?php echo $row_center['id']; ?>"> <?php echo $row_center['name']; ?> </option>
                                                                            <?php    }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Dirección</label>
                                                                    <textarea class="form-control" name="address" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Contrase&ntilde;a</label>
                                                                    <input type="text" class="form-control" name="pass" required>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                                        <input type="submit" class="btn btn-success" name="btnAddSecretaria" value="Guardar">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal HTML -->
                                    <div id="deleteSecretariaModal" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form>
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Eliminar secretaria</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Está seguro de querer eliminar esta secretaria?</p>
                                                        <p class="text-warning"><small>Esta tarea no se puede retroceder.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                                        <input type="submit" class="btn btn-danger" value="Eliminar">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="vendor/bootstrap/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="js/manejosec.js"></script>

</body>

</html>