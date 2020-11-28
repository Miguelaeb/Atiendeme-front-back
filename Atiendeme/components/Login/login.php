<?php
    session_start();
    if(isset($_SESSION['logged'])){
        header("location: ./homepac.php");
    }else{
        //header("location: ./login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Atiendeme - Login</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Shared CSS-->
    <link href="assets/css/shared.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/login.css" rel="stylesheet" media="all">

</head>

<body>

    <nav class="navbar">
        <div class="content">
            <div class="logo">
                <a href="index.php">Atiendeme</a>
            </div>
            <ul class="menu-list">
                <div class="icon cancel-btn">
                    <i class="fas fa-times"></i>
                </div>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#about-us">Sobre Nosotros</a></li>
                <li><a href="#contact-us">Contactanos</a></li>
                <li><a href="registro.php">Registrarse</a></li>
                <li><a href="login.php">Iniciar sesión</a></li>
            </ul>
            <div class="icon menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>


    <div class="page-wrapper bg-gra-01 p-t-100 p-b-100 font-poppins"> 
        <div class="wrapper wrapper--w680" style="padding-top: 100px">
            <div class="card card-3" > 
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Iniciar Sesión </h2>
                    <form method="POST" action="controller/login.php" method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Correo" name="email">
                            <i class="zmdi zmdi-account-box-mail input-icon"></i>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Contraseña" name="passw">
                            <i class="zmdi zmdi-key input-icon"></i>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/registro.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->