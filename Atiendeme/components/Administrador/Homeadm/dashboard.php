<?php
    session_start();
    if(isset($_SESSION['logged'])){
        //header("location: ./dashboard.php");
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

    <!-- Styles -->
    <link rel="stylesheet" href="css/dashboard-admin.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>Atiendeme - Administrador dashboard</title>
</head>

<body>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">Administrador</h4>
            </div>
            <div class="menu">
                <a href="dashboard.php" class="d-block text-light p-3 border-0 active-menu-option">Inicio</a>
                <a href="doctores.php" class="d-block text-light p-3 border-0 ">Doctores</a>
                <a href="consultorios.php" class="d-block text-light p-3 border-0 ">Consultorios</a>
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

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-0">Bienvenido <?php echo $_SESSION['userName']; ?></h1>
                                <p class="lead text-muted">¿Que le gustaria hacer?</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-mix py-3">
                    <div class="container">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <button type="button" class="btn btn-outline-info">Manejar doctores</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <button type="button" class="btn btn-outline-info">Manejar consultorios</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <button type="button" class="btn btn-outline-info">Manejar secretarias</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex my-3">
                                        <div class="mx-auto">
                                            <button type="button" class="btn btn-outline-info">Manejar servicios</button>
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
</body>

</html>