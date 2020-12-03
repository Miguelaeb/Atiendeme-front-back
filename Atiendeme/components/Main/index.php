<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/shared.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/dmhendricks/bootstrap-grid-css@4.1.3/dist/css/bootstrap-grid.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
                <li><a href="#">Inicio</a></li>
                <li><a href="#about-us">Sobre Nosotros</a></li>
                <li><a href="#services">Servicios</a></li>
                <li><a href="#contact-us">Contactanos</a></li>
                <li><a href="registro.php">
                    <?php
                        if(isset($_SESSION['logged'])){
                            echo "Home";
                        }else{
                            echo "Registrarse";
                        }
                    ?>
                </a></li>
                <li><a href="login.php">
                    <?php
                        if(isset($_SESSION['logged'])){
                            //echo "Perfil";
                        }else{
                            echo "Iniciar sesión";
                        }
                    ?>
                    </a></li>
            </ul>
            <div class="icon menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
    <div class="banner"></div>

    <!-- About us -->

    <!-- About us -->

    <div class="about" id="about-us">
        <div class="content bootstrap-wrapper" style="padding-bottom: 20px">
            <div class="title" style="padding-bottom: 40px">Sobre Nosotros</div>
            <div class="row text-center pad-bottom" style="text-align: center" data-scroll-reveal="enter from the bottom after 0.4s" data-scroll-reveal-id="5" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                <div class="col-md-4 padding-top-20">
                    <i class="fab fa-tripadvisor icon-fontawesome-service"></i>
                    <h4><strong>Nuestra Visión </strong></h4>
                    <p>
                        Ser la institución líder en servicios odontológicos a nivel nacional y América Latina; logrando la expansión de las coberturas, la mejora continúa de los procesos y garantizando calidad y profesionalidad.
                    </p>
                </div>

                <div class="col-md-4 padding-top-20">
                    <i class="fas fa-hands-helping icon-fontawesome-service"></i>

                    <h4><strong>Misión </strong></h4>
                    <p>
                        Brindar un servicio de excelencia en el área de salud oral, basado en conocimientos, alta tecnología y calidez humana que cubran las necesidades y expectativas de nuestros pacientes e interesados.
                    </p>
                </div>

                <div class="col-md-4 padding-top-20">
                    <i class="fas fa-clipboard-list icon-fontawesome-service"></i>
                    <h4><strong>  Área de Servicios </strong></h4>
                    <p>
                        Tenemos multiples servicios especialicados en lo que necesita:Cirugia Oral, Endodoncia, Ortodoncia, etc.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- Our Services -->

    <div class="about" id="services">
        <div class="content bootstrap-wrapper" style="padding-bottom: 20px">
            <div class="title" style="padding-bottom: 40px">Servicios</div>
            <div class="row text-center pad-bottom" style="text-align: center" data-scroll-reveal="enter from the bottom after 0.4s" data-scroll-reveal-id="5" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
                <div class="col-md-4 padding-top-20">
                    <img src="assets/images/braces.png">
                    <h4><strong> Protesis </strong></h4>
                    <p>
                        Ser la institución líder en servicios odontológicos a nivel nacional y América Latina; logrando la expansión de las coberturas, la mejora continúa de los procesos y garantizando calidad y profesionalidad.
                    </p>
                </div>

                <div class="col-md-4 padding-top-20">
                   

                    <h4><strong> Ortodoncia </strong></h4>
                    <p>
                        Brindar un servicio de excelencia en el área de salud oral, basado en conocimientos, alta tecnología y calidez humana que cubran las necesidades y expectativas de nuestros pacientes e interesados.
                    </p>
                </div>

                <div class="col-md-4 padding-top-20">
                 
                    <h4><strong>  Estetica dental </strong></h4>
                    <p>
                        Tenemos multiples servicios especialicados en lo que necesita:Cirugia Oral, Endodoncia, Ortodoncia, etc.
                    </p>
                </div>
            </div>
        </div>
    </div>
    


    <!-- Script -->

    <script>
        const body = document.querySelector("body");
        const navbar = document.querySelector(".navbar");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");
        menuBtn.onclick = () => {
            navbar.classList.add("show");
            menuBtn.classList.add("hide");
            body.classList.add("disabled");
        }
        cancelBtn.onclick = () => {
            body.classList.remove("disabled");
            navbar.classList.remove("show");
            menuBtn.classList.remove("hide");
        }
        window.onscroll = () => {
            this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }
    </script>


    <!-- Contact us -->

            <div class="ct-us" id="contact-us">
            <footer>
                <div class="main-content">
                    <div class="left box">
                        <h2>
                            Atiendeme</h2>
                        <div class="content">
                            <p>
                                Algunos buscan sonrisas bonitas, nosotros las creamos.</p>
                        </div>
                    </div>
                    <div class="right box">
                        <h2>
                            Contacto</h2>
                        <div class="content">
                            <div class="place">
                                <span class="fas fa-map-marker-alt"></span>
                                <span class="text">Santo Domingo, Este</span>
                            </div>
                            <div class="phone">
                                <span class="fas fa-phone-alt"></span>
                                <span class="text">+1(809)-253-4526 </span>
                            </div>
                            <div class="email">
                                <span class="fas fa-envelope"></span>
                                <span class="text">atiendeme@gmail.com</span>
                            </div>
                        </div>
                        </section>
                    </div>