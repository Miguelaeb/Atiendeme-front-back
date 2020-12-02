<?php
    require 'conn/conn.php';
    session_start();
    if(isset($_SESSION['logged'])){
        //echo "Stay here";
        $userType = $_SESSION['userType'];
        if($userType != 1){
            header("location: ./homepac.php");
        }
    }else{
        header("location: ./login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Atiendeme - Reserva pacietne</title>


    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Shared CSS-->
    <link href="assets/css/shared.css" rel="stylesheet" media="all">
    <link href="assets/css/calendar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/reserva.css" rel="stylesheet" media="all">

</head>

<body>

    <nav class="navbar">
        <div class="content">
            <div class="logo">
                <a href="#">Atiendeme</a>
            </div>
            <ul class="menu-list">
                <div class="icon cancel-btn">
                    <i class="fas fa-times"></i>
                </div>
                <li><a href="homepac.php">Home</a></li>
                <li><a href="#">Hacer cita</a></li>
                <li><a href="vercitaspac.php">Ver mis citas</a></li>
                <li><a href="#">Ver doctores</a></li>
            </ul>
            <div class="icon menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <div class="page-wrapper bg-gra-01 p-t-100 p-b-100 font-poppins">

        <section class="signup-step-container">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="step active">
                                        <a href="#" aria-controls="step1" role="tab" aria-expanded="true">
                                            <span class="round-tab">
                                                <i class="fa fa-hospital-o" aria-hidden="true"></i>    
                                            </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="step disabled">
                                        <a href="#" aria-controls="step2" role="tab" aria-expanded="false">
                                            <span class="round-tab">
                                             <i class="fa fa-user-md"  aria-hidden="true"></i>    
                                            </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="step disabled">
                                        <a href="#" aria-controls="step3" role="tab">
                                            <span class="round-tab">
                                                    <i class="fa fa-file-text-o"  aria-hidden="true"></i>   

                                            </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="step disabled">
                                        <a href="#" aria-controls="step4" role="tab">
                                            <span class="round-tab">
                                                <i  class="fa fa-check-circle-o" aria-hidden="true"></i>   
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <form role="form" action="controller/" class="login-box" id="reservasForm">
                                <div class="tab-content" id="main_form">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <h3 class="text-center mt-3 mb-5">Proceso de Reserva</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Centros:</label>
                                                    <input list="dentistList" value="" class="custom-select custom-select-md">
                                                    <datalist id="dentistList">
                                                        
                                                            <?php
                                                                $stmt_select_center =  $PDO_conn->prepare("SELECT * FROM centros");
                                                            $stmt_select_center->execute([]);
                                                            
                                                            while ($row_centers = $stmt_select_center->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <option value="<?php echo $row_centers['id']; ?>"><?php echo $row_centers['name']; ?></option>
                                                         <?php   }
                                                            ?>
                                                    </datalist>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Servicios:</label>
                                                    <input list="treatmentList" value="" class="custom-select custom-select-md">
                                                    <datalist id="treatmentList">
                                                                <?php
                                                                $stmt_select_services =  $PDO_conn->prepare("SELECT * FROM servicios");
                                                            $stmt_select_services->execute([]);
                                                            
                                                            while ($row_services = $stmt_select_services->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <option value="<?php echo $row_services['id']; ?>"><?php echo $row_services['name']; ?></option>
                                                         <?php   }
                                                            ?>
                                                        </datalist>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"> ¿Está reserva es para un dependiente?</label>
                                                    <select class="custom-select custom-select-md" id="depentiente">
                                                                <option value="SI" selected="selected">SI</option>
                                                                <option value="NO">NO </option> 
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6" id="dependienteDiv">
                                                <div class="form-group">
                                                    <label class="form-label">Dependiente:</label>
                                                    <select class="custom-select custom-select-md" id="dependientesList">
                                                            <?php
                                                            $paciente_id = $_SESSION['userId'];
                                                                $stmt_select_dependientes =  $PDO_conn->prepare("SELECT * FROM dependiente WHERE paciente_id = ?");
                                                            $stmt_select_dependientes->execute([$paciente_id]);
                                                            
                                                            while ($row_dependiente = $stmt_select_dependientes->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <option value="<?php echo $row_dependiente['id']; ?>"><?php echo $row_dependiente['name']; ?></option>
                                                         <?php   }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="default-btn next-step" onclick="nextTab(1)">Siguiente</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <h3 class="text-center mt-3 mb-5">Fecha y doctores disponibles</h3>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-datetime-local-input" class="form-label">Fecha</label>
                                                    <input type="text" class="form-control" name="datefilter" value="" />
                                                    <span class="fa fa-calendar input-icon-general"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="form-label">Doctores:</label>
                                                    <input list="doctosList" value="" class="custom-select custom-select-md">
                                                    <span class="fa fa-user-md input-icon-general" style="margin-right: 50px"></span>

                                                    <datalist id="doctosList">
                                                                <?php
                                                                $stmt_select_doctores =  $PDO_conn->prepare("SELECT * FROM doctores");
                                                            $stmt_select_doctores->execute([]);
                                                            
                                                            while ($row_doctor = $stmt_select_doctores->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <option value="<?php echo $row_doctor['id']; ?>"><?php echo $row_doctor['name']; ?></option>
                                                         <?php   }
                                                            ?>
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card booking-schedule schedule-widget">
                                                    <div class="schedule-header">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="day-slot">
                                                                    <ul>
                                                                        <li class="left-arrow"><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                                                        <li><span>Mon</span><span class="slot-date">11 Nov <small class="slot-year">2019</small></span></li>
                                                                        <li><span>Tue</span><span class="slot-date">12 Nov <small class="slot-year">2019</small></span></li>
                                                                        <li><span>Wed</span><span class="slot-date">13 Nov <small class="slot-year">2019</small></span></li>
                                                                        <li><span>Thu</span><span class="slot-date">14 Nov <small class="slot-year">2019</small></span></li>
                                                                        <li><span>Fri</span><span class="slot-date">15 Nov <small class="slot-year">2019</small></span></li>
                                                                        <li><span>Sat</span><span class="slot-date">16 Nov <small class="slot-year">2019</small></span></li>
                                                                        <li><span>Sun</span><span class="slot-date">17 Nov <small class="slot-year">2019</small></span></li>
                                                                        <li class="right-arrow"><a href=""><i class="fa fa-chevron-right"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="schedule-cont">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="time-slot">
                                                                    <ul class="clearfix">
                                                                        <li><a class="timing" href=""><span>9:00</span> <span>AM</span></a><a class="timing" href=""><span>10:00</span> <span>AM</span></a><a class="timing" href=""><span>11:00</span> <span>AM</span></a></li>
                                                                        <li><a class="timing" href=""><span>9:00</span> <span>AM</span></a><a class="timing" href=""><span>10:00</span> <span>AM</span></a><a class="timing" href=""><span>11:00</span> <span>AM</span></a></li>
                                                                        <li><a class="timing" href=""><span>9:00</span> <span>AM</span></a><a class="timing" href=""><span>10:00</span> <span>AM</span></a><a class="timing" href=""><span>11:00</span> <span>AM</span></a></li>
                                                                        <li><a class="timing" href=""><span>9:00</span> <span>AM</span></a><a class="timing" href=""><span>10:00</span> <span>AM</span></a><a class="timing" href=""><span>11:00</span> <span>AM</span></a></li>
                                                                        <li><a class="timing" href=""><span>9:00</span> <span>AM</span></a><a class="timing selected" href=""><span>10:00</span> <span>AM</span></a><a class="timing" href=""><span>11:00</span> <span>AM</span></a></li>
                                                                        <li><a class="timing" href=""><span>9:00</span> <span>AM</span></a><a class="timing" href=""><span>10:00</span> <span>AM</span></a><a class="timing" href=""><span>11:00</span> <span>AM</span></a></li>
                                                                        <li><a class="timing" href=""><span>9:00</span> <span>AM</span></a><a class="timing" href=""><span>10:00</span> <span>AM</span></a><a class="timing" href=""><span>11:00</span> <span>AM</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="default-btn prev-step" onclick="nextTab(-1)">Atras</button></li>
                                            <li><button type="button" class="default-btn next-step" onclick="nextTab(1)">Continue</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step3">
                                        <h3 class="text-center mt-3 mb-5">Detalles</h3>
                                        <div class="all-info-container">
                                            <div class="list-content">
                                                <a href="#listone" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Centro y Servicio<i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="listone">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-4 offset-md-2">
                                                                <p><strong>Centro:</strong> Dentis Care </p>
                                                            </div>

                                                            <div class="col-md-4 offset-md-2">
                                                                <p><strong>Servicio:</strong> Cariología </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <a href="#listtwo" data-toggle="collapse" aria-expanded="false" aria-controls="listtwo">Medico y Horario <i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="listtwo">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-4 offset-md-2">
                                                                <p><strong>Fecha:</strong> 12/12/2012 </p>
                                                            </div>

                                                            <div class="col-md-4 offset-md-2">
                                                                <p><strong>Horario:</strong> 9 AM</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-md-4 offset-md-2">
                                                                <p><strong>Doctor:</strong> Dr. Delgado</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="list-content">
                                                <a href="#listthree" data-toggle="collapse" aria-expanded="false" aria-controls="listthree">Paciente y Responsable <i class="fa fa-chevron-down"></i></a>
                                                <div class="collapse" id="listthree">
                                                    <div class="list-box">
                                                        <div class="row">
                                                            <div class="col-md-4 offset-md-2">
                                                                <p><strong>Paciente:</strong> Fulano</p>
                                                            </div>

                                                            <div class="col-md-4 offset-md-2">
                                                                <p><strong>Responsable:</strong> Fulano</p>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="default-btn prev-step" onclick="nextTab(-1)">Atras</button></li>
                                            <li><button type="button" class="default-btn next-step" onclick="nextTab(1)">Finalizar</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step4">

                                        <div class="card success-card">
                                            <div class="card-body">
                                                <div class="success-cont">
                                                    <i class="fa fa-check"></i>
                                                    <h3>¡Muy bien, ahora envia los datos!</h3>
                                                    <p>Cita con el
                                                        <strong>Dr. Delgado</strong>
                                                        <br> para el
                                                        <strong>12 Nov 2019 5:00PM A 6:00PM</strong>
                                                        para el paciente <strong>Fulano</strong> a nombre de <strong>Fulano</strong>
                                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                                    <button type="button" class="btn btn-primary view-inv-btn prev-step mb-0 pb-0 mt-0 mr-2 text-white" onclick="nextTab(-1)">
                                                    Atras
                                                    </button>

                                                    <button class="btn btn-primary view-inv-btn" style="background: none" type="submit">
                                                    Enviar
                                                    </button>
</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/datepicker/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- Main JS-->
    <script src="js/reserva.js"></script>
    <script src="scripts/shared.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->