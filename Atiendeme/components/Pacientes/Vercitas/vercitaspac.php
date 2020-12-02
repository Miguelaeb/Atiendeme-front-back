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
    <title>Atiendeme - Manejo de citas</title>
</head>

<body>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">Pacientes</h4>
            </div>
            <div class="menu">
                <a href="homepac.php" class="d-block text-light p-3 border-0 ">Home</a>
                <a href="hacer_citas.php" class="d-block text-light p-3 border-0">Hacer cita</a>
                <a href="vercitaspac.php" class="d-block text-light p-3 border-0 active-menu-option">Ver mis citas</a>
                <a href="dependientes.php" class="d-block text-light p-3 border-0">Dependientes</a>
                <a href="#" class="d-block text-light p-3 border-0">Ver doctores</a>
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
                                <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../../../assets/images/usuario.jpg" class="img-fluid rounded-circle avatar mr-2" alt="https://generated.photos/" /> Miguel Evangelista
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Mi perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Cerrar sesión</a>
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
                                                            <h2>Ver mis <b>citas</b></h2>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Fecha desde</label>
                                                            <input type="date" value="" class="form-control" >
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Fecha hasta</label>
                                                            <input type="date" value="" class="form-control" >
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label>Paciente</label>
                                                        <input type="text" class="form-control" name="name" >
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-info btn-block mb-2 mt-4">Buscar</button>
                                                        </div>

                                                    </div>
                                                </div>

                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Centro</th>
                                                            <th>Servicio</th>
                                                            <th>Doctor</th>
                                                            <th>Fecha</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Laura Gonzales</td>

                                                            <td></td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                <a href="#addDoctorModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Laura Genao</td>

                                                            <td></td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                <a href="#addDoctorModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                        </div>
                                    </div>
                                    <!-- Edit Modal HTML -->
                                    <div id="addDoctorModal" class="modal fade">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form>
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Modificar cita</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Nombre</label>
                                                                    <input type="text" class="form-control" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Consultorios</label>
                                                                    <select class="form-control" id="especialidades-modal-select" required name="states[]" multiple="multiple">
                                                                        <option value="Endodoncia">Endodoncia</option>
                                                                        ...
                                                                        <option value="Cariología">Cariología</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Servicios</label>
                                                                    <select class="form-control" id="centros-modal-select" required name="states[]" multiple="multiple">
                                                                        <option value="DentaCare">DentaCare</option>
                                                                        ...
                                                                        <option value="Centro Dental">Centro Dental</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Doctores</label>
                                                                    <select class="form-control" id="doctores-modal-select" required name="states[]" multiple="multiple">
                                                                        <option value="DentaCare">DentaCare</option>
                                                                        ...
                                                                        <option value="Centro Dental">Centro Dental</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label>Fecha</label>
                                                                    <input type="email" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                                        <input type="submit" class="btn btn-success" value="Guardar">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal HTML -->
                                    <div id="deleteEmployeeModal" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form>
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Borrar cita</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Está seguro de querer borrar este cita?</p>
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