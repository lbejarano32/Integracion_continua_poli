<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
      

        <title>Sanident</title>
        <meta charset="UTF-8"/>
        <link href="resources/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="resources/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="resources/css/estilonico.css"/>
        <link rel="stylesheet" type="text/css" href="resources/fonts/glyphicons-halflings-regular.svg"/>
        <link rel="shortcut icon" href="resources/images/logo.png" type="images/logo.png" />
        <!-- js -->
        <script src="resources/js/jquery-1.11.1.min.js"></script>
        <!-- //js -->
        <!-- scroll inferior-->

        <script type="text/javascript" src="resources/js/move-top.js"></script>
        <script type="text/javascript" src="resources/js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- scroll inferior -->

    

        <!-- validacion -->



        <script>
            $.validator.setDefaults({
                submitHandler: function () {
                    alert("enviado!");
                }
            });
            $().ready(function () {
                $("#formularioInicio").validate({
                    errorClass: "my-error-class",
                    validClass: "my-valid-class",
                    rules: {
                        usuario: {
                            required: true,
                            maxlength: 15,
                            minlength: 4
                        },
                        usuario: {
                            required: true,
                            maxlength: 15,
                            minlength: 4
                        },
                    },
                    messages: {
                        usuario: {
                            required: "Por favor ingrese su nombre de Usuario",
                            minlength: "debe tener mas de 4 caracteres",
                            maxlength: "debe tener menos de 15 caracteres"
                        },
                        clave: {
                            required: "Por favor ingrese su clave",
                            minlength: "de tener mas de 2 caracteres",
                            maxlength: "de tener menos de 10 caracteres"
                        }
                    }
                });
            });
        </script>
        <style type="text/css">
            .my-error-class {
                color:#FF0000; /* red */
            }
            .my-valid-class {
                color:#00CC00; /* green */
            }
        </style>



        <style type="text/css">
            .my-error-class {
                color:#FF0000;  /* red */
            }
            .my-valid-class {
                color:#00CC00; /* green */
            }
        </style>

    </head>
    <body>

        <div class="social">
            <ul>
                <h4 align="center" style="font-family:sans-serif" color="" ><strong>Fase V</strong></h4>
                <a class='boton' href="documentacion.php"></a>	
            </ul>

        </div>
        <div class="header" id="move-top">
            <div class="container">
                <div class="header-left">
                    <div class="logo">

                        <a href="index.php">

                            <img src="resources/images/logo4.png"/>
                        </a>

                    </div>
                </div>


                <!--                <div class="header-right">
                                    <ul>			
                                        <li><a href="#"><i class="facebook"> </i></a></li>
                                        <li><a href="#"><i class="twitter"> </i></a></li>
                                    </ul>
                                </div>-->
                <div class="clearfix"> </div>
            </div>
        </div>	


        <!-- //header -->
        <div class="header-banner">
            <div class="banner">
                <div class="container">
                    <div class="banner-navigation">
                        <div class="banner-nav">

                            <ul class="nav1">
                                <li class="hvr-sweep-to-top"><a href="index.php">Inicio</a></li>
                                <li class="hvr-sweep-to-top"><a href="#services" class="scroll">Servicios</a></li>
                                <li class="hvr-sweep-to-top"><a href="#news" class="scroll">Noticias</a></li>
                                <li class="hvr-sweep-to-top"><a href="login.php">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- script for menu -->
                <script>
                    $("span.menu").click(function () {
                        $("ul.nav1").slideToggle(300, function () {
                            // Animation complete.
                        });
                    });
                </script>
                <!-- //script for menu -->
                <div  id="top" class="callbacks_container">
                    <ul class="rslides" id="slider4">
                        <li>
                            <div class="banner-info">
                                <h3> El día más malgastado de todos, es uno sin sonrisas.</h3>
                            </div>
                        </li>
                        <li>
                            <div class="banner-info">
                                <h3>No existe mejor pregunta que una mirada... ni mejor respuesta que una sonrisa</h3>
                            </div>								
                        </li>
                        <li>
                            <div class="banner-info">
                                <h3>La revolución del amor comienza con una sonrisa.</h3>
                            </div>								
                        </li>
                    </ul>
                </div>
                <!-- banner Slider starts Here -->
                <script src="resources/js/responsiveslides.min.js"></script>
                <script>
                    // You can also use "$(window).load(function() {"
                    $(function () {
                        // Slideshow 4
                        $("#slider4").responsiveSlides({
                            auto: true,
                            pager: true,
                            nav: true,
                            speed: 500,
                            namespace: "callbacks",
                            before: function () {
                                $('.events').append("<li>before event fired.</li>");
                            },
                            after: function () {
                                $('.events').append("<li>after event fired.</li>");
                            }
                        });

                    });
                </script>				
            </div>
        </div>
        <!---->
        <!-- welcome -->
        <div class="welcome">
            <div class="container">
                <div class="welcome-head text-center">
                    <h2 style="color:#3BB2D0">Consultorios Sanident</h2>

                </div>
                <div class="welcome-grids">
                    <div class="col-md-6 welcome-left">
                        <img src="resources/images/wel.jpg" alt=""/>
                    </div>
                    <div class="col-md-6 welcome-right">
                        <h2 style="color:#3BB2D0">Misión</h2>
                        <p> Somos una empresa especializada en la administración y prestación de servicios odontológicos. Ofreciendo tarifas preferenciales a todos nuestros usuarios.</p>

                        <h2 style="color:#3BB2D0">Visión</h2>

                        <p>Ser reconocida como clínica líer en la prestación de servicios y soluciones dentales. </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- //welcome -->

        <!--/index-team-->
        <!-- //banner-bottom -->
        <div class="service-section" id="services">
            <div class="container">
                <div class="service-section-head text-center wow fadeInRight" data-wow-delay="0.4s">
                    <h3 >Nuestros Servicios</h3>
                    <h4 style="color: white">Ortodoncia | Diseño se sonrisa | blanqueamiento dental | Endodoncia | Cirugía maxilofacial.</h4>
                </div>
                <div class="service-section-grids">
                    <div class="col-md-6 service-grid">
                        <div class="service-section-grid">
                            <div class="icon">
                                <span class="d1 glyphicon glyphicon-leaf"></span>
                            </div>
                            <div class="icon-text">
                                <a href="single.html">Bio-Sanident</a>
                                <p>Sabemos que nuestros dientes forman parte integral de nuestro cuerpo. Sin embargo; en algunos casos, los dentistas no tienen esto presente y se limitan a hacer su trabajo en el área bucal de la salud humana. Los dentistas integrales, como quienes forman parte de Biodental Esthetics, llevamos a cabo nuestro trabajo de forma diferente.</p>
                            </div>
                        </div>
                        <div class="service-section-grid">
                            <div class="icon">
                                <span class="d2 glyphicon glyphicon-pushpin"></span>
                            </div>
                            <div class="icon-text">
                                <a href="single.html">Archivo Digitalizado</a>
                                <p>todo su proceso e principio a fin sera registrado en fotografia digital,cada paso se su tratamiento tendra un soporte fotografico que l epermita tener un seguimiento por su parte de los avances y podra ver los resultados paso a paso.</p>
                            </div>
                        </div>
                        <div class="service-section-grid">
                            <div class="icon">
                                <span class="d3 glyphicon glyphicon-tree-deciduous"></span>
                            </div>
                            <div class="icon-text">
                                <a href="single.html">Medio Ambiente</a>
                                <p>Cuidar el medio ambiente es tarea de todos los seres humanos y cualquier profesional puede aportar su grano de arena desde su espacio. Es por esto que una nueva tendencia en la odontología se decidió a hacer lo propio y crearon lo que se conoce como odontología verde. Esta tendencia no supone más que el correcto desecho de los materiales utilizados en el consultorio y la conciencia de cuidar nuestro planeta.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 service-grid">
                        <div class="service-section-grid">
                            <div class="icon">
                                <span class="d4 glyphicon glyphicon-apple"></span>									
                            </div>
                            <div class="icon-text">
                                <a href="single.html">Comer Sano</a>
                                <p>Lea Las Etiquetas De Los Productos Alimenticios Y Elija Alimentos Y Bebidas Que Sean Bajos En Azúcares Añadidos, Que Se Encuentran A Menudo En Las Bebidas Refrescantes, Los Caramelos Y Los Dulces. Nuestros Médicos Pueden Proporcionarle Sugerencias Para Su Consumo De Alimentos Diarios.</p>
                            </div>
                        </div>
                        <div class="service-section-grid">
                            <div class="icon">
                                <span class="d5 glyphicon glyphicon-inbox"></span>
                            </div>
                            <div class="icon-text">
                                <a href="single.html">Consultas</a>
                                <p>valuamos profesionalmente hasta el mínimo detalle relacionado con los requerimientos de nuestros pacientes, adicional a lo que nosotros podamos observar dentro del proceso de evaluación.

                                    Sólamente con base en un plan de tratamiento adecuado se puede iniciar cualquier procedimiento que lleve a la recuperación parcial o total del sistema dental.</p>
                            </div>
                        </div>
                        <div class="service-section-grid">
                            <div class="icon">

                                <span class="d6 glyphicon glyphicon-star-empty"></span>									
                            </div>

                            <div class="icon-text">

                                <a href="single.html">Plataforma Estrategica</a>

                                <p>La Plataforma Estratégica del consultorio odontologico sanident establece los lineamientos y compromisos que guían las acciones de cada de uno de los colaboradores vinculados a los procesos  colectivos.

                                    El propósito, la misión, los valores y los lineamientos estratégicos, son los componentes en los cuales se establece la razón de ser, los compromisos y las metas Planificacadas.

                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //services -->
        <!-- news -->
        <div class="news" id="news">
            <div class="container">
                <div class="news-section-head text-center">
                    <h3 style="color:#3BB2D0">Noticias y Eventos</h3>
                </div>
                <div class="news-section-grids">
                    <div class="col-md-4 news-section-grid">
                        <div class="date">
                            <p>17</p>
                            <p>MAY</p>
                        </div>
                        <div class="article_post">
                            <a href="single.html"><img src="resources/images/wel.jpg" alt="" /></a>
                            <a class="news-post" href="single.html">Super Descuentos</a>
                            <p>Descuentos Epeciales para niños aprovechela este 17 de mayo.No la puedes dejar perder</p>
                            <a class="more-news" href="single.html">Leer mas</a>
                        </div>
                    </div>
                    <div class="col-md-4 news-section-grid">
                        <div class="date">
                            <p>18</p>
                            <p>MAY</p>
                        </div>
                        <div class="article_post">
                            <a href="single.html"><img src="resources/images/n2.jpg" alt="" /></a>
                            <a class="news-post" href="single.html">Cupones</a>
                            <p>Por cada tratamiento que tengas con sanident,reclama tu cupon de descuento para la proxima cita. </p>
                            <a class="more-news" href="single.html">Leer mas</a>
                        </div>
                    </div>
                    <div class="col-md-4 news-section-grid">
                        <div class="date">
                            <p>27</p>
                            <p>MAR</p>
                        </div>
                        <div class="article_post">
                            <a href="single.html"><img src="resources/images/n3.jpg" alt="" /></a>
                            <a class="news-post" href="single.html">Cincuentaso</a>
                            <p>Los primeros 100 usuarios que envien su correo electronico tendran hasta el 50% de descuento en los examenes de nuestros servicios especiales</p>
                            <a class="more-news" href="single.html">Leer mas</a>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <!-- testimonials -->
        <div class="testimonials">
            <div class="container">
                <h3>Habladores....No lo creo</h3>
                <p class="aut">Estas personas dieron el primer paso pasa mejorar su salud vucal el proximo puedes ser tu...¡Animate!</p>
                <!-- Slider-starts-Here -->
                <script src="resources/js/responsiveslides.min.js"></script>
                <script>
                    // You can also use "$(window).load(function() {"
                    $(function () {
                        // Slideshow 4
                        $("#slider3").responsiveSlides({
                            auto: true,
                            pager: true,
                            nav: false,
                            speed: 500,
                            namespace: "callbacks",
                            before: function () {
                                $('.events').append("<li>before event fired.</li>");
                            },
                            after: function () {
                                $('.events').append("<li>after event fired.</li>");
                            }
                        });

                    });
                </script>
                <!--//End-slider-script -->
                <div  id="top" class="callbacks_container wow fadeInUp" data-wow-delay="0.5s">
                    <ul class="rslides" id="slider3">
                        <li>
                            <div class="testimonials-grids">
                                <div class="testimonials-grid-left">
                                    <img src="resources/images/2.png" alt=" " />
                                </div>
                                <div class="testimonials-grid-right">
                                    <p>Mariana Quintana...<span>Muy buena atención y asesoría por parte de la dentista y auxiliar.</span></p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </li>
                        <li>
                            <div class="testimonials-grids">
                                <div class="testimonials-grid-left">
                                    <img src="resources/images/3.png" alt=" " />
                                </div>
                                <div class="testimonials-grid-right">
                                    <p>Amarda Rocio...<span>Fue muy buena mi estadía en el consultorio.</span></p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </li>
                        <li>
                            <div class="testimonials-grids">
                                <div class="testimonials-grid-left">
                                    <img src="resources/images/4.png" alt=" " />
                                </div>
                                <div class="testimonials-grid-right">
                                    <p>Angelica Gutierrez...<span> Me sentí acogido y muy bien tratado por el doctor que no conocía. Aparentemente se ve todo muy profesional.</span></p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- //testimonials -->
        <!-- footer -->
        <div class="footer">
            <div class="container">
                <div class="footer-bottom-at">
                    <div class="col-md-6 footer-grid">
                        <h3>Sanident</h3>
                        <p>La revolución del amor comienza con una sonrisa.</p>
                        <p>Linea de Atención: 4343434 De Lunes a Viernes Desde las 7:00 a las  17:00 Hrs</p>
                    </div>
                    <div class="col-md-6 footer-grid-in">
                        <ul class="footer-nav">
                            <li><a href="index.php">Inicio</a>|</li>
                            <li><a href="#services">Servicios</a>|</li>
                            <li><a href="#news">noticias</a>|</li>
                            <li><a href="login.php">Login</a></li>	
                        </ul>
                        <p class="footer-class"> © 2017 Sanident <a href="" target="_blank"> Carol Pinilla - Adriana Martínez </a> </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>

        <!-- //footer -->

        <!-- here stars scrolling icon -->
        <script type="text/javascript">
            $(document).ready(function () {


                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>

        <!-- //here ends scrolling icon -->
    </body>
</html>
