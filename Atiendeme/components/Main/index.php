<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/shared.css">
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
                <li><a href="#servicios-us">Servicios</a></li>
                <li><a href="#contact-us">Contactanos</a></li>
                <li><a href="registro.php">
                    <?php
                        if(isset($_SESSION['logged'])){
                            echo "Mi perfil";
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

    <div class="about" id="about-us">
        <div class="content">
            <div class="title">We are awesome we are unique</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo impedit atque consequatur! Iusto distinctio temporibus repellendus labore odit adipisci harum ipsa beatae natus, eum eius, hic aperiam odio! Quasi molestias magnam illo voluptatem
                iusto ipsam blanditiis, tempore cumque reiciendis quaerat vero tenetur, sequi dolores libero voluptas vitae voluptate placeat dolorum modi ipsa nisi repellat facilis aliquam asperiores. Aut nam repellat harum quas saepe dolorum voluptates
                ratione, itaque consectetur explicabo a facilis rem mollitia maxime repudiandae fuga reprehenderit, odio cum incidunt labore molestiae quis non perferendis ipsam. Illum, in, deserunt. Ipsa.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit hic excepturi nobis id, eos dolor libero, nam assumenda, at culpa quos perspiciatis ratione ea modi! Natus sapiente a, explicabo sit quisquam eligendi esse provident eos enim
                doloremque blanditiis aut placeat veniam, libero nostrum quae. Ipsam, iste reprehenderit minima accusantium illo dolorem recusandae, ipsa autem quidem reiciendis a mollitia sit tenetur.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint doloremque perspiciatis voluptate ducimus reiciendis rem expedita voluptatibus dicta harum, quo, aspernatur maiores possimus officia quod? Aliquid molestiae illo sequi, tempora
                perferendis at incidunt nam porro voluptatibus, iste aperiam blanditiis adipisci ducimus repellendus distinctio nostrum ipsum! Voluptas facilis cum, atque tempora magnam beatae sequi! Doloribus expedita, cupiditate quo quod nemo aliquam,
                mollitia cum ea nam ullam soluta temporibus! Repudiandae incidunt consequatur distinctio deleniti obcaecati sit facilis unde, quisquam veniam ad doloribus!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet veniam error deleniti cum beatae non assumenda illum est dolores, possimus suscipit quibusdam eveniet id fuga dolore unde modi, sapiente voluptas. Mollitia veritatis explicabo
                cumque enim quia voluptates provident totam perferendis excepturi animi assumenda optio minus laudantium eveniet possimus amet blanditiis dolore in fuga atque, earum officia tempora quam similique est.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque ad sunt distinctio quidem incidunt cupiditate sequi deleniti, corrupti officia nam veritatis facilis veniam dolorum enim nisi ipsum dolor rem! Doloribus, eaque odit voluptatem
                iste laboriosam provident facere quo. Cum repellat pariatur, error ratione repellendus nisi quam culpa tempora facere in atque nesciunt, magni est aliquid unde soluta optio! Dolore pariatur, quaerat quo in cupiditate deleniti exercitationem.
                Facilis suscipit corporis unde aut minima nihil, eum molestias itaque, tenetur, beatae ipsa at!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque ad sunt distinctio quidem incidunt cupiditate sequi deleniti, corrupti officia nam veritatis facilis veniam dolorum enim nisi ipsum dolor rem! Doloribus, eaque odit voluptatem
                iste laboriosam provident facere quo. Cum repellat pariatur, error ratione repellendus nisi quam culpa tempora facere in atque nesciunt, magni est aliquid unde soluta optio! Dolore pariatur, quaerat quo in cupiditate deleniti exercitationem.
                Facilis suscipit corporis unde aut minima nihil, eum molestias itaque, tenetur, beatae ipsa at!</p>

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