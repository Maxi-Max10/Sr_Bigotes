
<!-- PHP INCLUDES -->

<?php

    include "connect.php";
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";

?>

    <!-- HOME SECTION -->

    <section class="home-section" id="home-section">
	    <div class="home-section-content">
		    <div id="home-section-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#home-section-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#home-section-carousel" data-slide-to="1"></li>
                    <li data-target="#home-section-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <!-- FIRST SLIDE -->
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide">
                        <div class="carousel-caption d-md-block">
                            <h3>Danos tu voto de confianza y la recompensa te encantará.</h3>
                            <p>
                                Tu vida para siempre puede cambiar dentro de las paredes de esta peluquería donde el look que desees 
                                <br>
                                puede convertirse en realidad.
                            </p>
                        </div>
                    </div>
                    <!-- SECOND SLIDE -->
                    <div class="carousel-item">
                        <img class="d-block w-100" src="Design/images/barbershop_image_2.jpg" alt="Second slide">
                        <div class="carousel-caption d-md-block">
                            <h3>Tu pelo necesita el mejor de los cuidados todos los días.</h3>
                            <p>
                                Un mundo sin peluquerías sería un mundo muy aburrido donde la mayoría tendría que conformarse 
                                <br>
                                con un simple estilo.
                            </p>
                        </div>
                    </div>
                    <!-- THIRD SLIDE -->
                    <div class="carousel-item">
                        <img class="d-block w-100" src="Design/images/barbershop_image_3.jpg" alt="Third slide">
                        <div class="carousel-caption d-md-block">
                            <h3>No es solo un corte de pelo, es una experiencia.</h3>
                            <p>
                                Nuestra barbería es el territorio creado puramente para hombres que aprecian
                                <br>
                                calidad premium, tiempo y aspecto impecable.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- PREVIOUS & NEXT 
                <a class="carousel-control-prev" href="#home-section-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#home-section-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                -->
            </div>
		</div>
	</section>

    <!-- ABOUT SECTION -->

    <section id="about" class="about_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_content" style="text-align: center;">
                        <h3>Introducción</h3>
                        <h2>Señor Bigotes <br>Science 1991</h2>
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

    <!-- SERVICES SECTION -->

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

    <!-- BOOKING SECTION -->

    <section class="book_section" id="booking">
        <div class="book_bg"></div>
        <div class="map_pattern"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <form action="appointment.php" method="post" id="appointment_form" class="form-horizontal appointment_form">
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

                        <!-- SUBMIT BUTTON -->

                        <button id="app_submit" class="default_btn" type="submit">
                            Solicitar Turno
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY SECTION -->

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

    <!-- TEAM SECTION -->

    <section id="team" class="team_section">
        <div class="container">
            <div class="section_heading ">
                
                <h2>Nuestros Peluqueros</h2>
                <div class=""></div>
            </div>
            <ul class="team_members row"> 
                <li class="col-lg-3 col-md-6 padd_col_res">
                    <div class="team_member">
                        <img src="Design/images/team-1.jpg" alt="Team Member">
                    </div>
                </li>
                <li class="col-lg-3 col-md-6 padd_col_res">
                    <div class="team_member">
                        <img src="Design/images/team-2.jpg" alt="Team Member">
                    </div>
                </li>
                <li class="col-lg-3 col-md-6 padd_col_res">
                    <div class="team_member">
                        <img src="Design/images/team-3.jpg" alt="Team Member">
                    </div>
                </li>
                <!-- <li class="col-lg-3 col-md-6 padd_col_res">
                    <div class="team_member">
                        <img src="Design/images/team-4.jpg" alt="Team Member">
                    </div>
                </li> -->
            </ul>
        </div>
    </section>

    <!-- REVIEWS SECTION -->

    <section id="reviews" class="testimonial_section">
        <div class="container">
            <div id="reviews-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <!--
                    <li data-target="#reviews-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#reviews-carousel" data-slide-to="1"></li>
                    <li data-target="#reviews-carousel" data-slide-to="2"></li>
                    -->
                </ol>
                <div class="carousel-inner">
                    <!-- REVIEW 1 -->
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide" style="visibility: hidden;">
                        <div class="carousel-caption d-md-block">
                            <h3>La mejor propina es un cliente satisfecho</h3>
                            <p>
                               La vida se ve mejor después de un corte de cabello.
                                <br>
                                
                            </p>
                        </div>
                    </div>
                    <!-- REVIEW 2 
                    <div class="carousel-item">
                        <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide"  style="visibility: hidden;">
                        <div class="carousel-caption d-md-block">
                            <h3>Hola</h3>
                            <p>
                                Our barbershop is the territory created purely for males who appreciate
                                <br>
                                
                            </p>
                        </div>
                    </div>
                    -->
                    <!-- REVIEW 3 
                    <div class="carousel-item">
                        <img class="d-block w-100" src="Design/images/barbershop_image_1.jpg" alt="First slide"  style="visibility: hidden;">
                        <div class="carousel-caption d-md-block">
                            <h3>Its Not Just a Haircut, Its an Experience.</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque libero quia fugit dicta repellat perferendis quas amet vero expedita explicabo ad nemo aut mollitia, nobis sit molestiae molestias. Ipsum, ipsa.

                                <br>
                                premium quality, time and flawless look.
                            </p>
                        </div>
                    </div>
                    -->
                </div>
                <!-- PREVIOUS & NEXT 
                <a class="carousel-control-prev" href="#reviews-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#reviews-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                -->
            </div>
        </div>
    </section>

    <!-- PRICING SECTION  -->

    <section class="pricing_section" id="pricing">

        <!-- START GET CATEGORIES  PRICES FROM DATABASE -->

            <?php

                $stmt = $con->prepare("Select * from categoria_servicios");
                $stmt->execute();
                $categories = $stmt->fetchAll();

            ?>

        <!-- END -->

        <div class="container">
            <div class="section_heading">
                <h3>Saca turno y ahorra un 20% en limpeza facial</h3>
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

    <!-- CONTACT SECTION 

    <section class="contact-section" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 sm-padding">
                    <div class="contact-info">
                        <h2>
                            Get in touch with us & 
                            <br>send us message today!
                        </h2>
                        <p>
                            Saasbiz is a different kind of architecture practice. Founded by LoganCee in 1991, we’re an employee-owned firm pursuing a democratic design process that values everyone’s input.
                        </p>
                        <h3>
                            198 West 21th Street, Suite 721 
                            <br>
                            New York, NY 10010
                        </h3>
                        <h4>
                            <span style = "font-weight: bold">Email:</span> 
                            Dynamiclayers.Net 
                            <br> 
                            <span style = "font-weight: bold">Phone:</span> 
                            +88 (0) 101 0000 000
                            <br> 
                            <span style = "font-weight: bold">Fax:</span> 
                            +88 (0) 202 0000 001
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6 sm-padding">
                    <div class="contact-form">
                        <div id="contact_ajax_form" class="contactForm">
                            <div class="form-group colum-row row">
                                <div class="col-sm-6">
                                    <input type="text" id="contact_name" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" id="contact_email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="contact_message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button id="contact_send" class="default_btn">Send Message</button>
                                </div>
                            </div>
                            <img src="Design/images/ajax_loader_gif.gif" id = "contact_ajax_loader" style="display: none">
                            <div id="contact_status_message"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->

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
                            Calle Pueyredón 250, Rodeo del Medio, Maipú, Mendoza.                       
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
                                width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER  -->

    <?php include "Includes/templates/footer.php"; ?>