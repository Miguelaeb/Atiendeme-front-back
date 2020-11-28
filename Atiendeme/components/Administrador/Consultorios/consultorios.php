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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-close-mask {
            z-index: 2099;
        }
        
        .select2-dropdown {
            z-index: 3051;
        }
    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="css/dashboard-admin.css">
    <link rel="stylesheet" href="assets/css/table.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Atiendeme - Manejo consultorios</title>

</head>

<body>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">Administrador</h4>
            </div>
            <div class="menu">
                <a href="dashboard.php" class="d-block text-light p-3 border-0 ">Inicio</a>
                <a href="doctores.php" class="d-block text-light p-3 border-0 ">Doctores</a>
                <a href="consultorios.php" class="d-block text-light p-3 border-0 active-menu-option">Consultorios</a>
                <a href="manejosec.php" class="d-block text-light p-3 border-0 ">Secretarias</a>
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
                                                            <h2>Manejar <b>Consultorios</b></h2>
                                                        </div>
                                                        <div class="col-sm-6">
                                                        <?php
                                                                if($userType == 4){ ?>
                                                                    <a href="#addConsultorioModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo consultorio</span></a>
                                                                <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Contacto</th>
                                                            <th>Dirección</th>
                                                            <th>Servicios</th>
                                                            <th>Doctores</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                            $stmt_select_center =  $PDO_conn->prepare("SELECT * FROM centros");
                                                            $stmt_select_center->execute([]);
                                                            
                                                            while ($row_centers = $stmt_select_center->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <tr id="<?php echo $row_centers['id']; ?>">
                                                                    <td><?php echo $row_centers['name']; ?></td>
                                                                    <td><?php echo $row_centers['email']; ?></td>

                                                                    <td><?php echo $row_centers['address']; ?></td>
                                                                    <td>
                                                                        <ul>
                                                                    <?php 
                                                                        $stmt_select_center_services =  $PDO_conn->prepare("SELECT * FROM center_services WHERE center_id = ?");
                                                                        $stmt_select_center_services->execute([$row_centers['id']]);
                                                                        while ($row_center_services = $stmt_select_center_services->fetch(PDO::FETCH_ASSOC)) {
                                                                            $stmt_select_services =  $PDO_conn->prepare("SELECT * FROM servicios WHERE id = ?");
                                                                            $stmt_select_services->execute([$row_center_services['services_id']]);
                                                                            while ($row_services = $stmt_select_services->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                                <li><?php echo $row_services['name']; ?></li>
                                                                            <?php }
                                                                        }
                                                                     ?>
                                                                     </ul>
                                                                     </td>
                                                                    <td>
                                                                        <ul>
                                                                        <?php 
                                                                            $stmt_select_center_doctors =  $PDO_conn->prepare("SELECT * FROM center_doctors WHERE center_id = ?");
                                                                            $stmt_select_center_doctors->execute([$row_centers['id']]);
                                                                            while ($row_center_doctors = $stmt_select_center_doctors->fetch(PDO::FETCH_ASSOC)) {
                                                                                $stmt_select_doctors =  $PDO_conn->prepare("SELECT * FROM doctores WHERE id = ?");
                                                                                $stmt_select_doctors->execute([$row_center_doctors['doctor_id']]);
                                                                                while ($row_doctors = $stmt_select_doctors->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                                    <li><?php echo $row_doctors['name']; ?></li>
                                                                                <?php }
                                                                            }
                                                                        ?>
                                                                        </ul>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#addConsultorioModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                                        <a href="#deleteCenterModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        ?>

                                                    </tbody>
                                                </table>
                                                <div class="clearfix">
                                                    <div class="hint-text">Mostrando <b>5</b> de <b>25</b> resultados</div>
                                                    <ul class="pagination">
                                                        <li class="page-item disabled"><a href="#">Anterior</a></li>
                                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                                                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                                                        <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                                                    </ul>
                                                </div>
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
    <!-- Edit Modal HTML -->
    <div id="addConsultorioModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="controller/add_center.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar consultorio</h4>
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
                                    <label>Servicios</label>
                                    <select class="form-control" id="especialidades-modal-select" required name="servicios[]" multiple="multiple">
                                            <?php
                                                                        $stmt_select_services =  $PDO_conn->prepare("SELECT * FROM servicios");
                                                                        $stmt_select_services->execute([]);
                                                                        
                                                                        while ($row_servicies = $stmt_select_services->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                                <option value="<?php echo $row_servicies['id']; ?>"><?php echo $row_servicies['name']; ?></option>
                                                                        <?php } ?>
                                        </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Doctores</label>
                                    <select class="form-control" id="doctores-modal-select" required name="doctores[]" multiple="multiple">
                                        <?php
                                                                        $stmt_select_dotors =  $PDO_conn->prepare("SELECT * FROM doctores");
                                                                        $stmt_select_dotors->execute([]);
                                                                        
                                                                        while ($row_doctors = $stmt_select_dotors->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                                <option value="<?php echo $row_doctors['id']; ?>"><?php echo $row_doctors['name']; ?></option>
                                                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <textarea class="form-control" name="address" required></textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" name="btnAddCenter" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteCenterModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar consultorio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>¿Está seguro de querer eliminar este consultorio?</p>
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
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="vendor/bootstrap/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="js/consultorio.js"></script>


</body>

</html>