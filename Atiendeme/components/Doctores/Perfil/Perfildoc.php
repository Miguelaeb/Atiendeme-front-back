<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="css/dashboard.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>Atiendeme - Doctor perfil</title>
</head>

<body>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">Doctores</h4>
            </div>
            <div class="menu">
                <a href="Homedoc.php" class="d-block text-light p-3 border-0 active-menu-option">Home</a>
                <a href="#" class="d-block text-light p-3 border-0 active-menu-option">Mi perfil</a>
                <a href="iniciocitas.php" class="d-block text-light p-3 border-0">Iniciar cita</a>
                <a href="CitasPendientes.php" class="d-block text-light p-3 border-0">Finalizar cita</a>
                <a href="HistorialCitas.php" class="d-block text-light p-3 border-0">Historial de citas</a>
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
                                    <img src="../../../assets/images/usuario.jpg" class="img-fluid rounded-circle avatar mr-2" alt="https://generated.photos/" /> Laura Genao
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
                                    <div class="col-md-6">
                                        <div class="text-center card-box">
                                            <div class="member-card pt-2 pb-2">
                                                <div class="thumb-lg member-thumb mx-auto">
                                                    <img src="assets/images/laura-facebook.jpg" class="rounded-circle img-thumbnail" alt="profile-image" style="width: 300px; height: 300px;">
                                                </div>
                                                <div class="">
                                                    <h4>Laura Genao</h4>
                                                    <p class="text-muted">lgenao@gmail.com | 849-666-6588 <span>| </span><span><a href="#" class="text-pink">atiendeme.com</a></span></p>
                                                </div>
                                                <ul class="social-links list-inline">
                                                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                                    <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                                                </ul>
                                                <div class="mt-4">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="mt-3">

                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mt-3">

                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mt-3">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" value="lgenao@gmail.com " class="form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Telefono</label>
                                                    <input type="text" value="849-666-6588" class="form-control" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Horario</label>
                                                    <textarea class="form-control" disabled></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4>Servicios</h4>

                                                    <ul class="list-group">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Endodoncia
                                                            
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Cariología
                                                            
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Odontología preventiva
                                                            
                                                        </li>
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

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="vendor/bootstrap/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="js/Perfil.js"></script>

</body>

</html>