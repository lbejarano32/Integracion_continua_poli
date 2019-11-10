<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
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

        <?php
        if (isset($_GET['mensaje'])) {
            ?>
            <script languaje="javascript" type="text/javascript">
                alert("Documento y clave no coincidien o no existe");
            </script>

        <?php } ?>
        <?php
        if (isset($_GET['inactivo'])) {
            ?>
            <script languaje="javascript" type="text/javascript">
                alert("Usuario Bloqueado");
            </script>

        <?php } ?>


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
        <!-- header -->	
        <div class="header">
            <div class="container">
                <div class="header-left">
                    <div class="logo">
                        <a href="index.php">

                            <img src="resources/images/logo4.png"/>
                        </a>
                    </div>
                </div>
                <div class="header-right">
                    <ul>
                        <a href="http://www.facebook.com"><i class="facebook"> </i></a>
                        <a href="http://www.twitter.com"><i class="twitter"> </i></a>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>	
        <!-- //header -->
        <!-- banner -->
        <div class="bannerl">
            <div class="container">
                <div class="banner-navigation">
                    <div class="banner-nav">
                        <span class="menu"><img src="resources/images/menu.png" alt=" "/></span>
                        <ul class="nav1">
                            <li class="hvr-sweep-to-top"><a href="index.php">Inicio</a></li>
                            <li class="hvr-sweep-to-top"><a href="#services" class="scroll">Servicios</a></li>
                            <li class="hvr-sweep-to-top"><a href="#news" class="scroll">Noticias</a></li>
                            <li class="hvr-sweep-to-top"><a href="login.php">Login</a></li>
                        </ul>
                    </div>
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

        <!-- //banner -->
        <!-- contact -->
        <div class="contact">

            <div class="container">
                <div class="contact-main">

                    <div class="container">
                        <div class="col-md-6">


                        </div>
                    </div>

                    <div class="col-md-6 contact-top-left">
                        <div class="mapas">
                            <h2 align="center" style="color: #3FB5C4"><strong>Tu mapa</strong></h2>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d3976.932279592084!2d-74.07908798035501!3d4.606146826502777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e2!4m3!3m2!1d4.6062351!2d-74.0781497!4m3!3m2!1d4.6074265!2d-74.0798605!5e0!3m2!1ses-419!2ses!4v1462637751266" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>

                        </div>

                        <h3 align="center">¿Cómo llegar?</h3>
                        <p align="center">Ubicado a tan solo 200 mts de la Avenida Caracas podrás tener la mejor experiencia en tratamientos odontológicos... Para mayor información comunícate al 4343434...Te esperamos</p>
                    </div>

                    <div class="col-md-6 contact-top-right">
                        <div class="contact-textarea">

                            <h2 align="center" style="color: #3FB5C4"><strong>Iniciar Sesión</strong></h2>

                            <div class="login_wrapper">
                                <div class="animate form login_form">


                                    <form id="formularioInicio" method="post" action="controladores/usuarioControlador.php">


                                        <div>
                                            <input type="text" class="form-control" id="usuario" placeholder="Documento" name="documento" required="true" value=""/>

                                        </div>


                                        <div>

                                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave" required="true" value=""/>

                                        </div>






                                        <div class="col-md-6">

                                            <input name="IniciarSesion" type="submit" class="btn btn-primary btn-block" value="Ingresar" role="button"/>

                                        </div>
                                        <!--                                        <div class="col-md-6">
                                                                                    <input type="submit" class="btn btn-primary btn-block" value="Olvidé Mi Contraseña" role="button"/>
                                        
                                        
                                                                                </div>-->


                                    </form>
                                </div>

                                <?php
                                if (isset($_GET['resp'])) {
                                    echo $_GET['resp'];
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- //contact -->
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