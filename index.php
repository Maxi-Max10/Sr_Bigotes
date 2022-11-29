
<!-- INCLUYE PHP -->

<?php

    include "connect.php";
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";

?>

    
    <!-- ACERCA DE LA SECCIÓN -->

    <section id="about" class="about_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_content" style="text-align: center;">
                        <h3>Introducción</h3>
                        <h2>Señor Bigotes <br>Desde 1991</h2>
                        <img src="Design/images/about-logo.png" alt="logo">
                        <p style="color: #777">
                        El peluquero es una persona cuya ocupación es principalmente cortar el cabello al estilo de los novios y afeitar el cabello de hombres y niños. El lugar de trabajo de un barbero se conoce como "barbería". Las barberías también son lugares de interacción social y discurso público. En algunos casos, las peluquerías también son foros públicos.
                        </p>
                        <a href="#" class="default_btn" style="opacity: 1;">Acerca de nosotros</a>
                    </div>
                </div>
                <div class="col-md-6  d-none d-md-block">
                    <div class="about_img" style = "overflow:hidden">
                        <img class="about_img_1" src="Design/images/about-1.jpg" alt="about-1">
                        <img class="about_img_2" src="Design/images/about-2.jpg" alt="about-2">
                        <img class="about_img_3" src="Design/images/about-3.jpg" alt="about-3">
                    </div>
                </div>
            </div>
        </div>
    </section>

     
    <!-- SECCIÓN DE SERVICIOS -->

    <section class="services_section" id="services">
        <div class="container">
            <div class="section_heading">
                
                <h2>Nuestros servicios</h2>
                <div class=""></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 padd_col_res">
                    <div class="service_box">
                        <i class="bs bs-scissors-1"></i>
                        <h3>Estilos de corte de pelo</h3>
                        <p>"Hoy es un buen día para cambiar tu corte de pelo."</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 padd_col_res">
                    <div class="service_box">
                        <i class="bs bs-razor-2"></i>
                        <h3>Recorte de Barba</h3>
                        <p>“Un filósofo que no podía caminar porque pisaba su barba, se cortó los pies.”</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 padd_col_res" >
                    <div class="service_box">
                        <i class="bs bs-brush"></i>
                        <h3>Afeitado</h3>
                        <p>"Un buen afeitado promueve el autocuidado."</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 padd_col_res">
                    <div class="service_box">
                        <i class="bs bs-hairbrush-1"></i>
                        <h3>Mascarilla facial</h3>
                        <p>“Tu piel es tu mejor carta de presentación.”</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN DE RESERVA -->

    <section class="book_section" id="booking">
        <div class="book_bg"></div>
        <div class="map_pattern"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <form action="cita.php" method="post" id="appointment_form" class="form-horizontal appointment_form">
                        <div class="book_content">
                            <h2 style="color: white;">Solicita Turno</h2>
                            <p style="color: #999;">
                            Peluquero es una persona cuya ocupación es principalmente <br> cortar, peinar y afeitar el cabello de hombres y niños.
                            </p>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 padding-10">  
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6 padding-10">
                                <input type="time" class="form-control">
                            </div>
                        </div>

                        <!-- BOTÓN ENVIAR -->

                        <button id="app_submit" class="default_btn" type="Submit">
                            Solicitar Turno
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN GALERÍA -->

    <section class="gallery-section" id="gallery">
        <div class="section_heading">
            
            <h2>Galeria</h2>
            <div class=""></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 gallery-column">
                    <div style="height: 230px">
                        <div class="gallery-img" style="background-image: url('Design/images/portfolio-1.jpg');">    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-column">
                    <div style="height: 230px">
                        <div class="gallery-img" style="background-image: url('Design/images/portfolio-2.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-column">
                    <div style="height: 230px">
                        <div class="gallery-img" style="background-image: url('Design/images/portfolio-3.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-column">
                    <div style="height: 230px">
                        <div class="gallery-img" style="background-image: url('Design/images/portfolio-4.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-column">
                    <div style="height: 230px">
                        <div class="gallery-img" style="background-image: url('Design/images/portfolio-5.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-column">
                    <div style="height: 230px">
                        <div class="gallery-img" style="background-image: url('Design/images/portfolio-6.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-column">
                    <div style="height: 230px">
                        <div class="gallery-img" style="background-image: url('Design/images/portfolio-7.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-column">
                    <div style="height: 230px">
                        <div class="gallery-img" style="background-image: url('Design/images/portfolio-8.jpg');"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

   

    <!-- SECCIÓN DE PRECIOS  -->

    <section class="pricing_section" id="pricing">

        <!-- OBTENER CATEGORÍA DE PRECIO DESDE LA BASE DE DATOS -->

            <?php

                $stmt = $con->prepare("Select * from categoria_servicios");
                $stmt->execute();
                $categories = $stmt->fetchAll();

            ?>

        <!-- FIN -->

        <div class="container">
            <div class="section_heading">
                
                <h2>Lista de precios</h2>
                <div class=""></div>
            </div>
            <div class="row">
                <?php

                    foreach($categories as $category)
                    {
                        $stmt = $con->prepare("Select * from servicios where id_categoria = ?");
                        $stmt->execute(array($category['id_categoria']));
                        $totalServices =  $stmt->rowCount();
                        $servicios = $stmt->fetchAll();

                        if($totalServices > 0)
                        {
                        ?>

                            <div class="col-lg-4 col-md-6 sm-padding">
                                <div class="price_wrap">
                                    <h3><?php echo $category['nombre_categoria'] ?></h3>
                                    <ul class="price_list">
                                        <?php

                                            foreach($servicios as $service)
                                            {
                                                ?>

                                                    <li>
                                                        <h4><?php echo $service['nombre_servicio'] ?></h4>
                                                        <p><?php echo $service['descripcion_servicio'] ?></p>
                                                        <span class="price">$<?php echo $service['precio_servicio'] ?></span>
                                                    </li>

                                                <?php
                                            }

                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>

                        <?php
                        }
                    }

                ?>
                
            </div>
        </div>
    </section>


    <!-- WIDGET SECTION / FOOTER -->
    <section class="widget_section" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <img src="Design/images/bigote.logo.png" alt="Brand" width= 150>
                        <p>
                           Nuestra barbería está creada para hombres que aprecian la calidad superior, el tiempo la apariencia.
                        </p>
                        <ul class="widget_social">
                            <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook-f fa-2x"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter fa-2x"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="Instagram"><i class="fab fa-instagram fa-2x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                     <div class="footer_widget">
                        <h3>Dirección</h3>
                        <p>
                           Ruta Provincial 50 S/N, Rodeo del Medio, Mendoza.                       
                        <p>
                            contact@señorbigote.com
                            <br>
                            (261) 4921026    
                        </p>
                     </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <h3>
                            Horario de apertura                        
                        </h3>
                        <ul class="opening_time">
                            <p>Martes - Sabado 9:00am - 20:30pm</p>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer_widget">
                        <h3>Ubicación</h3>
                        <div class="subscribe_form">
                            
                            <form action="#" class="subscribe_form" novalidate="true">
                                
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d836.6266228619234!2d-68.6886332708046!3d-32.990419773939415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e6d36f3d4d071%3A0x76b2cffee528bf69!2sEscuela%20Juan%20Isidro%20Maza!5e0!3m2!1ses-419!2sar!4v1662864940681!5m2!1ses-419!2sar" 
                                width="auto" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER  -->

    <?php include "Includes/templates/footer.php"; ?>